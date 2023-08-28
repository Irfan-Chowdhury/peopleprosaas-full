<?php

namespace App\Http\Controllers\Landlord;

use App\Http\traits\TenantTrait;
use App\Models\Landlord\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Landlord\Customer;
use Exception;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    use TenantTrait;

    public function customerSignUp(Request $request)
    {
        // return $request->all();
        $customerData = [
            'company_name' => $request->company_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ];

        DB::beginTransaction();
        try
		{
            $customer = Customer::create($customerData);
            $package = Package::find($request->package_id);

            if($package->is_free_trial) {
                $this->createTenant($request, $customer, $package);
                // return \Redirect::to('https://'.$request->tenant.'.'.env('CENTRAL_DOMAIN'));
            }
            DB::commit();

        } catch (Exception $e)
        {
            DB::rollback();
            return $e->getMessage();
        }
        return 'Tenant Created';

        // {
        //     "db_id":null,
        //     "expiry_date":"2023-07-31",
        //     "tenancy_db_name":"acme",
        //     "package_id":"3",
        //     "subscription_type":"monthly",
        //     "company_name":"Acme Inc",
        //     "phone_number":"34234234",
        //     "email":"info@acme.com"
        // }

        // {
        //     "email": "acme@lioncoders.com",
        //     "created_at": "2023-08-28 11:20:03",
        //     "package_id": 3,
        //     "updated_at": "2023-08-28 11:20:03",
        //     "company_name": "Lion Coders",
        //     "tenancy_db_name": "lionsaas",
        //     "subscription_type": "monthly"
        // }


    }
}
