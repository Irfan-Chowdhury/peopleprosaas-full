<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index()
    {
        return 1;
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




}
