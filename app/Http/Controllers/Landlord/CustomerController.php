<?php

namespace App\Http\Controllers\Landlord;

use App\Contracts\PackageContract;
use App\Events\CustomerRegistered;
use App\Facades\Alert;
use App\Http\traits\TenantTrait;
use App\Models\Landlord\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerSignUpRequest;
use App\Http\Requests\Customer\RenewSubscriptionRequest;
use App\Mail\ConfirmationEmail;
use App\Models\Landlord\Customer;
use App\Models\Landlord\GeneralSetting;
use App\Models\Tenant;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class CustomerController extends Controller
{
    use TenantTrait;

    public function __construct(public PackageContract $packageContract)
    {}

    public function index()
    {
        $packages = $this->packageContract->getSelectData(['id','name']);

        return view('landlord.super-admin.pages.customers.index', compact('packages'));
    }

    public function datatable()
    {
        $tenants = Tenant::with(['customer','package','domainInfo'])->get();

        if (request()->ajax()) {
            return datatables()->of($tenants)
                ->setRowId(function ($row) {
                    return $row->id;
                })
                ->addColumn('tenantId', function ($row) {
                    return $row->id;
                })
                ->addColumn('database', function ($row) {
                    return $row->tenancy_db_name;
                })
                ->addColumn('domain', function ($row) {
                    return '<a href="https://'.$row->domainInfo->domain.'" target="_blank">'.$row->domainInfo->domain.'</a>';
                })
                ->addColumn('customer', function ($row) {
                    return $row->customer->first_name.' '.$row->customer->last_name;
                })
                ->addColumn('email', function ($row) {
                    return $row->customer->email;
                })
                ->addColumn('package', function ($row) {
                    return $row->package->name;
                })
                ->addColumn('subscription_type', function ($row) {
                    return $row->subscription_type;
                })
                ->addColumn('action', function ($row) {
                    $button  = '<button type="button" data-id="'.$row->id.'" class="renewSubscription btn btn-warning btn-sm mr-2" title="Renew Subscription"><i class="dripicons-clockwise"></i></button>';
                    $button .= '<button type="button" data-id="'.$row->id.'" class="changePackage btn btn-success btn-sm mr-2" title="Change Package"><i class="dripicons-swap"></i></button>';
                    $button .= '<button type="button" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm" title="Delete"><i class="dripicons-trash"></i></button>';

                    return $button;
                })
                ->rawColumns(['domain','action'])
                ->make(true);
        }
    }


    public function customerSignUp(CustomerSignUpRequest $request)
    {
        DB::beginTransaction();
        try {

            $this->tenantGenerate($request);

            DB::commit();
            $result =  Alert::successMessage('Data Created Successfully');

            if (request()->ajax()) {
                return response()->json($result['alertMsg'], $result['statusCode']);
            } else {
                return redirect()->back()->with(['success' => 'Data Created Successfully']);
            }

        }
        catch (Exception $e) {
            DB::rollback();
            $result =  Alert::errorMessage($e->getMessage());

            if (request()->ajax()) {
                return response()->json($result['alertMsg'], $result['statusCode']);
            } else {
                return redirect()->back()->withErrors(['errors' => [$result['alertMsg']]]);
            }
        }
    }


    public function tenantInfo(Tenant $tenant)
    {
        return response()->json($tenant);
    }

    public function renewSubscriptionUpdate(RenewSubscriptionRequest $request, Tenant $tenant)
    {
        DB::beginTransaction();
        try {
            $expiryDate = date('Y-m-d', strtotime($request->expiry_date));

            $generalSetting = GeneralSetting::latest()->first();

            $packageDetailsForTenant = $this->packageDetailsForTenant($tenant->package, $generalSetting, $request);
            $packageDetailsForTenant['expiry_date'] = $expiryDate;

            $tenant->run(function ($tenant) use ($packageDetailsForTenant) {
                $this->setDataInTenantGeneralSetting($packageDetailsForTenant);
            });

            $tenant->expiry_date = $expiryDate;
            $tenant->subscription_type = $request->subscription_type;
            $tenant->update();
            $result =  Alert::successMessage('Data Update Successfully');

            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            $result =  Alert::errorMessage($e->getMessage());
        }

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function changePackageProcess(Request $request, Tenant $tenant)
    {
        DB::beginTransaction();
        try {
            $tenant->package_id = $request->package_id;
            $tenant->update();

            $permissions = json_decode($tenant->package->permissions, true);
            $allPermissionIds = explode(',',$tenant->package->permission_ids);

            $tenant->run(function ($tenant) use ($request, $permissions, $allPermissionIds) {
                DB::table('permissions')->delete();
                DB::table('permissions')->insert($permissions);
                $role = Role::find(1);
                $role->syncPermissions($allPermissionIds);
            });
            $result =  Alert::successMessage('Package Switched Successfully');
            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            $result =  Alert::errorMessage($e->getMessage());
        }

        return response()->json($result['alertMsg'], $result['statusCode']);
    }


    protected function tenantGenerate($request) : void
    {
        $customer = Customer::create($this->customerData($request));
        $package = Package::find($request->package_id);

        if($package->is_free_trial) {
            $this->createTenant($request, $customer, $package);
            // return \Redirect::to('https://'.$request->tenant.'.'.env('CENTRAL_DOMAIN'));
        }

        // Mail::to($request->email)->send(new ConfirmationEmail($request)); //This is ok
        // event(new CustomerRegistered($request));
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

    public function destroy(Tenant $tenant)
    {
        try {
            $tenant->domainInfo->delete();
            $tenant->delete();
            $result =  Alert::successMessage('Data Created Successfully');
        }
        catch (Exception $e) {
            $result =  Alert::errorMessage($e->getMessage());
        }
        return response()->json($result['alertMsg'], $result['statusCode']);
    }


    public function test()
    {
        // Update --
        // $tenant = Tenant::find('saastest24');
        // $tenant->run(function ($tenant) {
        //     $user = User::find(3);
        //     $user->first_name = 'irfan';
        //     $user->update();
        // });



        // Delete --
        // $tenant = Tenant::find('saastest1');
        // $tenant->domainInfo->delete();
        // $tenant->delete();
        // return 'ok';
    }
}