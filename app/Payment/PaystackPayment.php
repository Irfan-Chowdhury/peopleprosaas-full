<?php
declare(strict_types=1);

namespace App\Payment;

use App\Contracts\PaybleContract;
use App\Models\Landlord\Payment;
use Exception;

class PaystackPayment implements PaybleContract
{
    public function pay($tenantRequestData, $paymentRequestData)
    {
        // $request->reference    = 12345;
        // $request->email        = 'irfanchowdhury80@gmail.com';
        // $request->amount       = $request->total_amount * 100;
        // $request->currency     = env('PAYSTACK_CURRENCY');
        // $request->callback_url = route('payment.pay.callback');
        $totalAmount = request()->session()->get('price');

        $data= [
            'reference' => date('Ymdhis'),
            'amount' => $totalAmount * 100,
            'currency' => 'NGN',
            'email' => 'user@mail.com',
            // 'callback_url' => route('payment.success'),
        ];
        $objectData = (object)$data;

        $pay = json_decode($this->initiatePayment($objectData));
        if ($pay) {
            if ($pay->status) {
                return redirect($pay->data->authorization_url);
            } else {
                // return $pay->message;
                throw new Exception($pay->message);
            }
        } else {
            throw new Exception("Something went wrong");
        }

        // $totalAmount = request()->session()->get('price');
        // $payment = Payment::create([
        //     'package_id' => $tenantRequestData->package_id,
        //     'amount' => $totalAmount,
        //     'payment_method' => $tenantRequestData->payment_method,
        //     'status' => 'paid',
        //     'subscription_type' => $tenantRequestData->subscription_type,
        //     'data' => json_encode($paymentRequestData)
        // ]);
        // return $payment;
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
        if ($response) {
            $reference  = $response->data->reference;
            if ($response->status=='success') {
                $payment_id = $response->data->id;
                // return $this->updateOrderAfterPaymentComplete($reference, $payment_id);
            } else {
                // $this->undoTableDataAndRestoreProductQuantity($reference);
                return redirect('order_cancel')->withError($response->message);
            }
        } else {
            // $this->latestOrderCancel();
            return redirect('order_cancel')->withError("Something went wrong");
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
