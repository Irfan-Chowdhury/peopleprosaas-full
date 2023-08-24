<?php

namespace Tests\Traits;

trait PermissionTestTrait
{
    public function selectedPermissions()
    {
        return array(
            array(
				'id' => 1,
				'guard_name' => 'web',
				'name' => 'user',
                'parent'=> null,
                'treeview'=> 1
			),
            array(
				'id' => 5,
				'guard_name' => 'web',
				'name' => 'details-employee',
                'parent'=> null,
                'treeview'=> 1
			),
            array(
				'id' => 10,
				'guard_name' => 'web',
				'name' => 'customize-setting',
                'parent'=> null,
                'treeview'=> 1
			),
            array(
				'id' => 11,
				'guard_name' => 'web',
				'name' => 'role',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
            array(
				'id' => 17,
				'guard_name' => 'web',
				'name' => 'general-setting',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
            array(
				'id' => 20,
				'guard_name' => 'web',
				'name' => 'mail-setting',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
            array(
				'id' => 23,
				'guard_name' => 'web',
				'name' => 'access-variable_type',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
            array(
				'id' => 24,
				'guard_name' => 'web',
				'name' => 'access-variable_method',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
            array(
				'id' => 25,
				'guard_name' => 'web',
				'name' => 'access-language',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
            // Company
            array(
                'id' => 26,
                'guard_name' => 'web',
                'name' => 'company',
                'parent' => null,
                'treeview' => 1
            ),

            // Department
            array(
                'id' => 31,
                'guard_name' => 'web',
                'name' => 'department',
                'parent' => null,
                'treeview' => 1
            ),
            // Designation
            array(
                'id' => 36,
                'guard_name' => 'web',
                'name' => 'designation',
                'parent' => null,
                'treeview' => 1
            ),
            // Location
            array(
                'id' => 41,
                'guard_name' => 'web',
                'name' => 'location',
                'parent' => null,
                'treeview' => 1
            ),
            // Core HR
            array(
                'id' => 46,
                'guard_name' => 'web',
                'name' => 'core_hr',
                'parent' => null,
                'treeview' => 1
            ),
            array(
                'id' => 47,
                'guard_name' => 'web',
                'name' => 'view-calendar',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            // Promotion
            array(
                'id' => 48,
                'guard_name' => 'web',
                'name' => 'promotion',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            // Award
            array(
                'id' => 53,
                'guard_name' => 'web',
                'name' => 'award',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            array(
                'id' => 58,
                'guard_name' => 'web',
                'name' => 'transfer',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            // Travel
            array(
                'id' => 63,
                'guard_name' => 'web',
                'name' => 'travel',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            // Resignation
            array(
                'id' => 68,
                'guard_name' => 'web',
                'name' => 'resignation',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            // Complaint
            array(
                'id' => 73,
                'guard_name' => 'web',
                'name' => 'complaint',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            // Warning
            array(
                'id' => 78,
                'guard_name' => 'web',
                'name' => 'warning',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            // Termination
            array(
                'id' => 83,
                'guard_name' => 'web',
                'name' => 'termination',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
        );
    }

    public function expectedResultOfPermisson()
    {
        $permissions = $this->allPermissions();

        usort($permissions, function ($a, $b) {
            return $a['id'] - $b['id'];
        });

        return $permissions;
    }


    private function allPermissions()
    {
        return array(
            array(
				'id' => 1,
                'guard_name' => 'web',
				'name' => 'user',
                'parent'=> null,
                'treeview'=> 1
			),
			array(
				'id' => 2,
                'guard_name' => 'web',
				'name' => 'view-user',
                'parent'=> 'user',
                'treeview'=> 1
			),
			array(
				'id' => 3,
                'guard_name' => 'web',
				'name' => 'edit-user',
                'parent'=> 'user',
                'treeview'=> 1
			),
			array(
				'id' => 4,
                'guard_name' => 'web',
				'name' => 'delete-user',
                'parent'=> 'user',
                'treeview'=> 1
			),
            [
				'id' => 277,
				'guard_name' => 'web',
				'name' => 'store-user',
                'parent'=> 'user',
                'treeview'=> 1
            ],
            [
				'id' => 278,
				'guard_name' => 'web',
				'name' => 'last-login-user',
                'parent'=> 'user',
                'treeview'=> 1
            ],
            [
				'id' => 279,
				'guard_name' => 'web',
				'name' => 'role-access-user',
                'parent'=> 'user',
                'treeview'=> 1
            ],
            array(
				'id' => 5,
				'guard_name' => 'web',
				'name' => 'details-employee',
                'parent'=> null,
                'treeview'=> 1
			),
            array(
				'id' => 6,
				'guard_name' => 'web',
				'name' => 'view-details-employee',
                'parent'=> 'details-employee',
                'treeview'=> 1
			),
			array(
				'id' => 7,
				'guard_name' => 'web',
				'name' => 'store-details-employee',
                'parent'=> 'details-employee',
                'treeview'=> 1
			),
			array(
				'id' => 8,
				'guard_name' => 'web',
				'name' => 'modify-details-employee',
                'parent'=> 'details-employee',
                'treeview'=> 1
			),
            array(
				'id' => 9,
				'guard_name' => 'web',
				'name' => 'import-employee',
                'parent'=> 'details-employee',
                'treeview'=> 1
			),

            array(
				'id' => 10,
				'guard_name' => 'web',
				'name' => 'customize-setting',
                'parent'=> null,
                'treeview'=> 1
			),
            array(
				'id' => 11,
				'guard_name' => 'web',
				'name' => 'role',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
			array(
				'id' => 12,
				'guard_name' => 'web',
				'name' => 'view-role',
                'parent'=> 'role',
                'treeview'=> 1
			),
			array(
				'id' => 13,
				'guard_name' => 'web',
				'name' => 'store-role',
                'parent'=> 'role',
                'treeview'=> 1
			),
			array(
				'id' => 14,
				'guard_name' => 'web',
				'name' => 'edit-role',
                'parent'=> 'role',
                'treeview'=> 1
			),
			array(
				'id' => 15,
				'guard_name' => 'web',
				'name' => 'delete-role',
                'parent'=> 'role',
                'treeview'=> 1
			),
            array(
				'id' => 16,
				'guard_name' => 'web',
				'name' => 'set-permission',
                'parent'=> 'role',
                'treeview'=> 1
			),
            array(
				'id' => 17,
				'guard_name' => 'web',
				'name' => 'general-setting',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
            array(
				'id' => 18,
				'guard_name' => 'web',
				'name' => 'view-general-setting',
                'parent'=> 'general-setting',
                'treeview'=> 1
			),
            array(
				'id' => 19,
				'guard_name' => 'web',
				'name' => 'store-general-setting',
                'parent'=> 'general-setting',
                'treeview'=> 1
			),
            array(
				'id' => 20,
				'guard_name' => 'web',
				'name' => 'mail-setting',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
            array(
				'id' => 21,
				'guard_name' => 'web',
				'name' => 'view-mail-setting',
                'parent'=> 'mail-setting',
                'treeview'=> 1
			),
            array(
				'id' => 22,
				'guard_name' => 'web',
				'name' => 'store-mail-setting',
                'parent'=> 'mail-setting',
                'treeview'=> 1
			),
            array(
				'id' => 23,
				'guard_name' => 'web',
				'name' => 'access-variable_type',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
            array(
				'id' => 24,
				'guard_name' => 'web',
				'name' => 'access-variable_method',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
            array(
				'id' => 25,
				'guard_name' => 'web',
				'name' => 'access-language',
                'parent'=> 'customize-setting',
                'treeview'=> 1
			),
            // Company
            array(
                'id' => 26,
                'guard_name' => 'web',
                'name' => 'company',
                'parent' => null,
                'treeview' => 1
            ),
            array(
                'id' => 27,
                'guard_name' => 'web',
                'name' => 'view-company',
                'parent' => 'company',
                'treeview' => 1
            ),
            array(
                'id' => 28,
                'guard_name' => 'web',
                'name' => 'store-company',
                'parent' => 'company',
                'treeview' => 1
            ),
            array(
                'id' => 29,
                'guard_name' => 'web',
                'name' => 'edit-company',
                'parent' => 'company',
                'treeview' => 1
            ),
            array(
                'id' => 30,
                'guard_name' => 'web',
                'name' => 'delete-company',
                'parent' => 'company',
                'treeview' => 1
            ),
            // Department
            array(
                'id' => 31,
                'guard_name' => 'web',
                'name' => 'department',
                'parent' => null,
                'treeview' => 1
            ),
            array(
                'id' => 32,
                'guard_name' => 'web',
                'name' => 'view-department',
                'parent' => 'department',
                'treeview' => 1
            ),
            array(
                'id' => 33,
                'guard_name' => 'web',
                'name' => 'store-department',
                'parent' => 'department',
                'treeview' => 1
            ),
            array(
                'id' => 34,
                'guard_name' => 'web',
                'name' => 'edit-department',
                'parent' => 'department',
                'treeview' => 1
            ),
            array(
                'id' => 35,
                'guard_name' => 'web',
                'name' => 'delete-department',
                'parent' => 'department',
                'treeview' => 1
            ),
                        // Designation
            array(
                'id' => 36,
                'guard_name' => 'web',
                'name' => 'designation',
                'parent' => null,
                'treeview' => 1
            ),
            array(
                'id' => 37,
                'guard_name' => 'web',
                'name' => 'view-designation',
                'parent' => 'designation',
                'treeview' => 1
            ),
            array(
                'id' => 38,
                'guard_name' => 'web',
                'name' => 'store-designation',
                'parent' => 'designation',
                'treeview' => 1
            ),
            array(
                'id' => 39,
                'guard_name' => 'web',
                'name' => 'edit-designation',
                'parent' => 'designation',
                'treeview' => 1
            ),
            array(
                'id' => 40,
                'guard_name' => 'web',
                'name' => 'delete-designation',
                'parent' => 'designation',
                'treeview' => 1
            ),

            // Location
            array(
                'id' => 41,
                'guard_name' => 'web',
                'name' => 'location',
                'parent' => null,
                'treeview' => 1
            ),
            array(
                'id' => 42,
                'guard_name' => 'web',
                'name' => 'view-location',
                'parent' => 'location',
                'treeview' => 1
            ),
            array(
                'id' => 43,
                'guard_name' => 'web',
                'name' => 'store-location',
                'parent' => 'location',
                'treeview' => 1
            ),
            array(
                'id' => 44,
                'guard_name' => 'web',
                'name' => 'edit-location',
                'parent' => 'location',
                'treeview' => 1
            ),
            array(
                'id' => 45,
                'guard_name' => 'web',
                'name' => 'delete-location',
                'parent' => 'location',
                'treeview' => 1
            ),
            // Core HR
            array(
                'id' => 46,
                'guard_name' => 'web',
                'name' => 'core_hr',
                'parent' => null,
                'treeview' => 1
            ),
            array(
                'id' => 47,
                'guard_name' => 'web',
                'name' => 'view-calendar',
                'parent' => 'core_hr',
                'treeview' => 1
            ),

            // Promotion
            array(
                'id' => 48,
                'guard_name' => 'web',
                'name' => 'promotion',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            array(
                'id' => 49,
                'guard_name' => 'web',
                'name' => 'view-promotion',
                'parent' => 'promotion',
                'treeview' => 1
            ),
            array(
                'id' => 50,
                'guard_name' => 'web',
                'name' => 'store-promotion',
                'parent' => 'promotion',
                'treeview' => 1
            ),
            array(
                'id' => 51,
                'guard_name' => 'web',
                'name' => 'edit-promotion',
                'parent' => 'promotion',
                'treeview' => 1
            ),
            array(
                'id' => 52,
                'guard_name' => 'web',
                'name' => 'delete-promotion',
                'parent' => 'promotion',
                'treeview' => 1
            ),
            // Award
            array(
                'id' => 53,
                'guard_name' => 'web',
                'name' => 'award',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            array(
                'id' => 54,
                'guard_name' => 'web',
                'name' => 'view-award',
                'parent' => 'award',
                'treeview' => 1
            ),
            array(
                'id' => 55,
                'guard_name' => 'web',
                'name' => 'store-award',
                'parent' => 'award',
                'treeview' => 1
            ),
            array(
                'id' => 56,
                'guard_name' => 'web',
                'name' => 'edit-award',
                'parent' => 'award',
                'treeview' => 1
            ),
            array(
                'id' => 57,
                'guard_name' => 'web',
                'name' => 'delete-award',
                'parent' => 'award',
                'treeview' => 1
            ),
            // Transfer
            array(
                'id' => 58,
                'guard_name' => 'web',
                'name' => 'transfer',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            array(
                'id' => 59,
                'guard_name' => 'web',
                'name' => 'view-transfer',
                'parent' => 'transfer',
                'treeview' => 1
            ),
            array(
                'id' => 60,
                'guard_name' => 'web',
                'name' => 'store-transfer',
                'parent' => 'transfer',
                'treeview' => 1
            ),
            array(
                'id' => 61,
                'guard_name' => 'web',
                'name' => 'edit-transfer',
                'parent' => 'transfer',
                'treeview' => 1
            ),
            array(
                'id' => 62,
                'guard_name' => 'web',
                'name' => 'delete-transfer',
                'parent' => 'transfer',
                'treeview' => 1
            ),
            // Travel
            array(
                'id' => 63,
                'guard_name' => 'web',
                'name' => 'travel',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            array(
                'id' => 64,
                'guard_name' => 'web',
                'name' => 'view-travel',
                'parent' => 'travel',
                'treeview' => 1
            ),
            array(
                'id' => 65,
                'guard_name' => 'web',
                'name' => 'store-travel',
                'parent' => 'travel',
                'treeview' => 1
            ),
            array(
                'id' => 66,
                'guard_name' => 'web',
                'name' => 'edit-travel',
                'parent' => 'travel',
                'treeview' => 1
            ),
            array(
                'id' => 67,
                'guard_name' => 'web',
                'name' => 'delete-travel',
                'parent' => 'travel',
                'treeview' => 1
            ),
            // Resignation
            array(
                'id' => 68,
                'guard_name' => 'web',
                'name' => 'resignation',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            array(
                'id' => 69,
                'guard_name' => 'web',
                'name' => 'view-resignation',
                'parent' => 'resignation',
                'treeview' => 1
            ),
            array(
                'id' => 70,
                'guard_name' => 'web',
                'name' => 'store-resignation',
                'parent' => 'resignation',
                'treeview' => 1
            ),
            array(
                'id' => 71,
                'guard_name' => 'web',
                'name' => 'edit-resignation',
                'parent' => 'resignation',
                'treeview' => 1
            ),
            array(
                'id' => 72,
                'guard_name' => 'web',
                'name' => 'delete-resignation',
                'parent' => 'resignation',
                'treeview' => 1
            ),
            // Complaint
            array(
                'id' => 73,
                'guard_name' => 'web',
                'name' => 'complaint',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            array(
                'id' => 74,
                'guard_name' => 'web',
                'name' => 'view-complaint',
                'parent' => 'complaint',
                'treeview' => 1
            ),
            array(
                'id' => 75,
                'guard_name' => 'web',
                'name' => 'store-complaint',
                'parent' => 'complaint',
                'treeview' => 1
            ),
            array(
                'id' => 76,
                'guard_name' => 'web',
                'name' => 'edit-complaint',
                'parent' => 'complaint',
                'treeview' => 1
            ),
            array(
                'id' => 77,
                'guard_name' => 'web',
                'name' => 'delete-complaint',
                'parent' => 'complaint',
                'treeview' => 1
            ),
            // Warning
            array(
                'id' => 78,
                'guard_name' => 'web',
                'name' => 'warning',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            array(
                'id' => 79,
                'guard_name' => 'web',
                'name' => 'view-warning',
                'parent' => 'warning',
                'treeview' => 1
            ),
            array(
                'id' => 80,
                'guard_name' => 'web',
                'name' => 'store-warning',
                'parent' => 'warning',
                'treeview' => 1
            ),
            array(
                'id' => 81,
                'guard_name' => 'web',
                'name' => 'edit-warning',
                'parent' => 'warning',
                'treeview' => 1
            ),
            array(
                'id' => 82,
                'guard_name' => 'web',
                'name' => 'delete-warning',
                'parent' => 'warning',
                'treeview' => 1
            ),
            // Termination
            array(
                'id' => 83,
                'guard_name' => 'web',
                'name' => 'termination',
                'parent' => 'core_hr',
                'treeview' => 1
            ),
            array(
                'id' => 84,
                'guard_name' => 'web',
                'name' => 'view-termination',
                'parent' => 'termination',
                'treeview' => 1
            ),
            array(
                'id' => 85,
                'guard_name' => 'web',
                'name' => 'store-termination',
                'parent' => 'termination',
                'treeview' => 1
            ),
            array(
                'id' => 86,
                'guard_name' => 'web',
                'name' => 'edit-termination',
                'parent' => 'termination',
                'treeview' => 1
            ),
            array(
                'id' => 87,
                'guard_name' => 'web',
                'name' => 'delete-termination',
                'parent' => 'termination',
                'treeview' => 1
            ),

        );
    }
}
