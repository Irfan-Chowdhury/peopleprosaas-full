<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Landlord\Package;
use App\Models\Landlord\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index()
    {
        return view('landlord.super-admin.pages.packages.index');
    }

    public function datatable()
    {
        $packages = Package::all();

        return datatables()->of($packages)
        ->setRowId(function ($row) {
            return $row->id;
        })
        ->addColumn('name', function ($row) {
            return $row->name;
        })
        ->addColumn('is_free_trial', function ($row) {
            return $row->is_free_trial ? 'Yes' : 'No' ;
        })
        ->addColumn('monthly_fee', function ($row) {
            return $row->monthly_fee;
        })
        ->addColumn('yearly_fee', function ($row) {
            return $row->yearly_fee;
        })
        ->addColumn('number_of_user_account', function ($row) {
            return $row->number_of_user_account;
        })
        ->addColumn('number_of_employee', function ($row) {
            return $row->number_of_employee;
        })
        ->addColumn('action', function ($row) {
            $button = '<a href="'.route('package.edit', $row->id) .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>&nbsp;&nbsp;';
            $button .= '<button type="button" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

            return $button;
        })
        ->rawColumns(['image', 'action'])
        ->make(true);
    }

    public function create()
    {
        $dbPermissions =  DB::table('permissions')->get();

        $permissionsData = $this->reFormatPermissionData($dbPermissions);
        // return $uniqueParentIds = $this->uniqueParentIds($permissionsData);
        // $topLevelItems = $this->displayDataAsNestedTree($permissionsData);
        // return $permissionIds = $this->displayPermissionIdsByParent($topLevelItems);

        return view('landlord.super-admin.pages.packages.create',compact('permissionsData'));
    }


    protected function reFormatPermissionData($dbPermissions) : array
    {
        $permissionsData = [];
        foreach ($dbPermissions as  $item) {
            $permissionsData[] = [
                'id' => $item->name,
                'name' => $this->formatString($item->name),
                'treeview' => $item->treeview,
                'parent' => $item->parent,
            ];
        }
        return $permissionsData;
    }

    protected function uniqueParentIds($permissionsData)
    {
        $parentIds = [];
        foreach ($permissionsData as $permission) {
            if($permission['parent'] === null)
                $parentIds[] = $permission['id'];
            else
                $parentIds[] = $permission['parent'];
        }
        return array_unique($parentIds);
    }


    protected function formatString($originalString) {
        $data = str_replace('-', ' ', $originalString);

        $formattedString = ucwords($data);
        return $formattedString;
    }

    public function displayDataAsNestedTree($permissionsData)
    {
        $nestedData = [];
        foreach ($permissionsData as $permission) {
            $id = $permission['id'];
            $parent = $permission['parent'];

            $nestedData[$id] = $permission;
            $nestedData[$id]['children'] = [];
        }

        foreach ($nestedData as $id => &$item) {
            $parent = $item['parent'];

            if ($parent !== null && isset($nestedData[$parent])) {
                $nestedData[$parent]['children'][] = &$item;
            }
        }

        $topLevelItems = array_filter($nestedData, function ($item) {
            return $item['parent'] === null;
        });

        return $topLevelItems;
    }

    public function displayPermissionIdsByParent($topLevelItems)
    {
        $data = [];
        foreach ($topLevelItems as $topLevelItem) {
            $data[] = $this->extractIds($topLevelItem);
        }
        return $data;
    }

    private function extractIds($item)
    {
        $ids = [$item['id']];
        if (!empty($item['children'])) {
            foreach ($item['children'] as $child) {
                $ids = array_merge($ids, $this->extractIds($child));
            }
        }
        return $ids;
    }


    public function store(Request $request)
    {
        // $dbPermissions =  Permission::select('id','name','parent','treeview')->get();
        // $dbPermissions =  Package::latest()->first();
        // return json_decode($dbPermissions->permissions);

        // $selectedparentSlugs = explode(',',$request->features[0]);
        // $skipSlug = [
        //     'customize-setting',
        //     'core_hr',
        //     'timesheet'
        // ];

        // $matchedSlugs = [];
        // foreach ($skipSlug as $element) {
        //     if (in_array($element, $selectedparentSlugs)) {
        //         $matchedSlugs[] = $element;
        //     }
        // }

        // $selectedparentSlugs = array_values(array_diff($selectedparentSlugs, $matchedSlugs));

        // $data1 = Permission::select('id','name','parent','treeview')
        //         ->whereIn('parent', $selectedparentSlugs)
        //         ->orderBy('id','ASC')
        //         ->get()->toArray();

        // $parentSlug = array_merge($selectedparentSlugs, $matchedSlugs);

        // $data2 = Permission::select('id','name','parent','treeview')
        //         ->whereIn('name', $parentSlug)
        //         ->orderBy('id','ASC')
        //         ->get()->toArray();

        // // $mergedData = array_merge($data1, $data2);

        // $resultOfPermissions = array_merge($data1, $data2);
        // usort($resultOfPermissions, function ($a, $b) {
        //     return $a['id'] - $b['id'];
        // });

        $resultOfPermissions = $this->featureAndPermissionManage($request->features[0]);

        $permission_names = array_column($resultOfPermissions,'name');
        $permission_ids = array_column($resultOfPermissions,'id');

        // return json_decode(json_encode($permission_names));
        // return implode(',', $permission_names);

        // $data = [
        //     'name' => $request->name,
        //     'is_free_trial' => $request->is_free_trial,
        //     'monthly_fee' => $request->monthly_fee,
        //     'yearly_fee' => $request->yearly_fee,
        //     'number_of_user_account' => $request->number_of_user_account,
        //     'number_of_employee' => $request->number_of_employee,
        //     'features' => $request->features[0],
        //     'permission_ids' => $request->permission_ids,
        //     'is_active' => $request->is_active,
        // ];

        Package::create([
            'name' => $request->name,
            'is_free_trial' => $request->is_free_trial ? true : false,
            'monthly_fee' => $request->monthly_fee,
            'yearly_fee' => $request->yearly_fee,
            'number_of_user_account' => $request->number_of_user_account,
            'number_of_employee' => $request->number_of_employee,
            'features' => $request->features[0],
            'permissions' => json_encode($resultOfPermissions),
            'permission_names' => implode(',', $permission_names),
            'permission_ids' => implode(',', $permission_ids),
            'is_active' => $request->is_active ? true : false,
        ]);

        return 'Store Successfully';
    }

    public function edit(Package $package)
    {
        $permissionNames = explode(',',$package->permission_names);
        return view('landlord.super-admin.pages.packages.edit',compact('package', 'permissionNames'));
    }

    public function update(Package $package, Request $request)
    {
        $resultOfPermissions = $this->featureAndPermissionManage($request->features[0]);
        $permission_names = array_column($resultOfPermissions,'name');
        $permission_ids = array_column($resultOfPermissions,'id');

        $package->update([
            'name' => $request->name,
            'is_free_trial' => $request->is_free_trial ? true : false,
            'monthly_fee' => $request->monthly_fee,
            'yearly_fee' => $request->yearly_fee,
            'number_of_user_account' => $request->number_of_user_account,
            'number_of_employee' => $request->number_of_employee,
            'features' => $request->features[0],
            'permissions' => json_encode($resultOfPermissions),
            'permission_names' => implode(',', $permission_names),
            'permission_ids' => implode(',', $permission_ids),
            'is_active' => $request->is_active ? true : false,
        ]);

        return 'Updated Successfully';

    }

    protected function featureAndPermissionManage($features) : array
    {
        $selectedparentSlugs = explode(',',$features);
        $skipSlug = [
            'customize-setting',
            'core_hr',
            'timesheet'
        ];

        $matchedSlugs = [];
        foreach ($skipSlug as $element) {
            if (in_array($element, $selectedparentSlugs)) {
                $matchedSlugs[] = $element;
            }
        }

        $selectedparentSlugs = array_values(array_diff($selectedparentSlugs, $matchedSlugs));

        $data1 = Permission::select('id','name','parent','treeview')
                ->whereIn('parent', $selectedparentSlugs)
                ->orderBy('id','ASC')
                ->get()->toArray();

        $parentSlug = array_merge($selectedparentSlugs, $matchedSlugs);

        $data2 = Permission::select('id','name','parent','treeview')
                ->whereIn('name', $parentSlug)
                ->orderBy('id','ASC')
                ->get()->toArray();

        // $mergedData = array_merge($data1, $data2);

        $resultOfPermissions = array_merge($data1, $data2);
        usort($resultOfPermissions, function ($a, $b) {
            return $a['id'] - $b['id'];
        });

        return $resultOfPermissions;
    }

}


        // $parentNullids = [];
        // $parentNotNullIds = [];
        // $lastChildIds = [];
        // foreach ($dbPermissions as $key => $item) {
        //     if (in_array($item->name, $selectedparentIds) && $item->parent=== null) {
        //         $parentNullids[] = $item->name;
        //     }
        //     else if (in_array($item->name, $selectedparentIds) && $item->parent) {
        //         $parentNotNullIds[] = $item->name;
        //     }
        // }
        // foreach($dbPermissions as $item) {
        //     if (in_array($item->parent, $parentNotNullIds)) {
        //         $lastChildIds[] = $item->name;
        //     }
        // }
        // return $allids = array_merge($parentNullids, $parentNotNullIds, $lastChildIds);

        // return Permission::select('id','name','parent','treeview')->get();





        // foreach ($skipSlug as $element) {
        //     if (in_array($element, $selectedparentSlugs)) {
        //         $matchedSlugs[] = $element;
        //         // $index = array_search($element, $selectedparentSlugs);
        //         // if ($index !== false) {
        //         //     unset($selectedparentSlugs[$index]);
        //         // }
        //     }
        // }
