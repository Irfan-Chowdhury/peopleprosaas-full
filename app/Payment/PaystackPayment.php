<?php
declare(strict_types=1);

namespace App\Payment;

use App\Contracts\PaybleContract;
use App\Models\Landlord\Payment;
use Exception;
use Illuminate\Support\Facades\Session;

class PaystackPayment implements PaybleContract
{
    public function pay($tenantRequestData, $paymentRequestData)
    {
        $totalAmount = request()->session()->get('price');
        $data= [
            'reference' => date('Ymdhis'),
            'amount' => $totalAmount * 100,
            'currency' => 'NGN',
            'email' => 'user@mail.com',
            'callback_url' => url("/payment/paystack/pay/callback"),
        ];
        $objectData = (object)$data;

        $pay = json_decode($this->initiatePayment($objectData));
        if ($pay->status) {
            $payment = Payment::create([
                'package_id' => $tenantRequestData->package_id,
                'amount' => $totalAmount,
                'payment_method' => $tenantRequestData->payment_method,
                'status' => 'pending',
                'subscription_type' => $tenantRequestData->subscription_type,
                'data' => json_encode($paymentRequestData)
            ]);
            Session::put('paymentId', $payment->id);
            Session::put('reference', $pay->data->reference);
            Session::put('authorization_url', $pay->data->authorization_url);

            return $payment;

        } else {
            throw new Exception($pay->message);
        }

    }

    protected function initiatePayment($objectData)
    {
        $url = "https://api.paystack.co/transaction/initialize";

        $fields_string = http_build_query($objectData);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . env('PAYSTACK_SECRET_KEY'),
            "Cache-Control: no-cache",
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function paymentCallback()
    {
        $response = json_decode($this->verifyPayment(request('reference')));
        if (isset($response) && $response->status) {
            if(Session::has('paymentId')) {
                Payment::where('id', Session::get('paymentId'))->update([
                    'status' => 'paid',
                    'data' => json_encode($response)
                ]);
            }
        } else {

            throw new Exception("Something Wrong ! Please try again later.");
        }
    }



    protected function verifyPayment($reference)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env('PAYSTACK_SECRET_KEY'),
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return  $response;
    }

    public function cancel()
    {

    }
}


//*Irfan95#
