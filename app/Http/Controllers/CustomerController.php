<?php

namespace App\Http\Controllers;

use App\Http\traits\TenantTrait;
use App\Models\Landlord\Package;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use TenantTrait;

    public function customerSignUp(Request $request)
    {
        // return $request->all();

        // $package = Package::select('is_free_trial')->find($request->package_id);
        $package = Package::find(2);
        // return gettype(json_decode($package->permissions));

        if($package->is_free_trial) {
            $this->createTenant($request, $package);
            // return \Redirect::to('https://'.$request->tenant.'.'.env('CENTRAL_DOMAIN'));
        }
        return 'Tenant Created';
    }
}
