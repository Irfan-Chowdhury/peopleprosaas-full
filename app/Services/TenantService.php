<?php

namespace App\Services;

use App\Http\traits\TenantTrait;
use App\Models\Landlord\Customer;
use App\Models\Landlord\GeneralSetting;
use App\Models\GeneralSetting as TenantGeneralSetting;
use App\Models\Landlord\Package;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class TenantService
{
    // use TenantTrait;

    public function NewTenantGenerate($request) : object
    {
        $customer = Customer::create(self::customerData($request));
        $package = Package::find($request->package_id);

        return self::createTenant($request, $customer, $package);

        // if($package->is_free_trial) {
        //     $this->createTenant($request, $customer, $package);
        //     // return \Redirect::to('https://'.$request->tenant.'.'.env('CENTRAL_DOMAIN'));
        // }

        // Mail::to($request->email)->send(new ConfirmationEmail($request));
        // event(new CustomerRegistered($request)); // Testing Purpose
    }

    protected function customerData($request)
    {
        return  [
            'company_name' => $request->company_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ];
    }


    protected function createTenant($request, $customer, $package) : object
    {
        $generalSetting = GeneralSetting::latest()->first();

        $numberOfDaysToExpired = self::numberOfDaysToExpired($package, $generalSetting, $request);
        $packageDetailsForTenant =  self::packageDetailsForTenant($package, $generalSetting, $request);
        $packageDetailsForTenant['expiry_date'] = date("Y-m-d", strtotime("+".$numberOfDaysToExpired." days"));

        $permissions = json_decode($package->permissions, true);
        $allPermissionIds = explode(',',$package->permission_ids);
        // package_details

        $tenantData = [
            'id' => $request->tenant,
            'tenancy_db_name' => env('DB_PREFIX').$request->tenant,
            'customer_id' => $customer->id,
            'package_id' => $package->id,
            'subscription_type'=> $request->subscription_type,
            'expiry_date' => date("Y-m-d", strtotime("+".$numberOfDaysToExpired." days"))
        ];
        $tenant = Tenant::create($tenantData);
        $tenant->domains()->create(['domain' => $request->tenant.'.'.env('CENTRAL_DOMAIN')]); // This Line

        $tenant->run(function () use ($request, $permissions, $allPermissionIds, $packageDetailsForTenant) {
            DB::table('permissions')->insert($permissions);
            $user = self::tenantAdminCreate($request);
            $role = Role::findById(1);
			$role->syncPermissions($allPermissionIds);
			$user->syncRoles(1);

            self::setDataInTenantGeneralSetting($packageDetailsForTenant);
        });

        return $tenant;
    }

    protected function numberOfDaysToExpired($package, $generalSetting, $request)
    {
        if($package->is_free_trial)
            $numberOfDaysToExpired = $generalSetting->free_trial_limit;
        elseif($request->subscription_type == 'monthly')
            $numberOfDaysToExpired = 30;
        elseif($request->subscription_type == 'yearly')
            $numberOfDaysToExpired = 365;

        return $numberOfDaysToExpired;
    }


    protected function setDataInTenantGeneralSetting($packageDetailsForTenant) : void
    {
        $tenantGeneralSetting = TenantGeneralSetting::latest()->first();
        $tenantGeneralSetting->update([
            'package_details' => json_encode($packageDetailsForTenant)
        ]);
    }


    public function packageDetailsForTenant($package, $generalSetting, $request)
    {
        return [
            'package_id' => $package->id,
            'name' => $package->name,
            'is_free_trial' => $package->is_free_trial,
            'free_trial_limit' => $generalSetting->free_trial_limit,
            'monthly_fee' => $package->monthly_fee,
            'yearly_fee' => $package->yearly_fee,
            'number_of_user_account' => $package->number_of_user_account,
            'number_of_employee' => $package->number_of_employee,
            'subscription_type'=> $request->subscription_type,
        ];
    }


    protected function tenantAdminCreate($request) : object
    {
        return User::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'username'=> $request->username,
            'email'=> $request->email,
            'contact_no'=> $request->contact_no,
            'role_users_id'=> 1,
            'is_active'=> true,
            'password'=> bcrypt($request->password)
        ]);
    }



    public function permissionUpdate($tenant, $request, $package)
    {
        $generalSetting = GeneralSetting::latest()->first();

        $prevPermissions = json_decode($tenant->package->permissions, true);
        $prevPermissionIds = array_column($prevPermissions, 'id');

        $tenant->package_id = $request->package_id;
        $tenant->update();

        $latestPermissions = json_decode($package->permissions, true);
        $latestPermissionsIds = array_column($latestPermissions, 'id');

        $newAddedPermissions = [];
        foreach ($latestPermissions as $element) {
            if (!in_array($element["id"], $prevPermissionIds)) {
                $newAddedPermissions[] = $element;
            }
        }


        $numberOfDaysToExpired = self::numberOfDaysToExpired($package, $generalSetting, $request);
        $packageDetailsForTenant =  self::packageDetailsForTenant($package, $generalSetting, $request);
        $packageDetailsForTenant['expiry_date'] = date("Y-m-d", strtotime("+".$numberOfDaysToExpired." days"));


        $tenant->run(function () use ($newAddedPermissions, $latestPermissionsIds, $packageDetailsForTenant) {
            DB::table('permissions')->whereNotIn('id', $latestPermissionsIds)->delete();
            DB::table('permissions')->insert($newAddedPermissions);
            $role = Role::findById(1);
            $role->syncPermissions($latestPermissionsIds);

            self::setDataInTenantGeneralSetting($packageDetailsForTenant);
        });
    }
}