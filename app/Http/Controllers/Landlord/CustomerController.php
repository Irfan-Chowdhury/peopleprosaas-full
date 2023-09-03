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
use App\Mail\ConfirmationEmail;
use App\Models\Landlord\Customer;
use App\Models\Tenant;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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
                    $button = '<button type="button" data-id="'.$row->id.'" class="edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

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
