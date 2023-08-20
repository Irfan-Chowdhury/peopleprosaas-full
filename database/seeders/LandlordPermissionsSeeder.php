<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandlordPermissionsSeeder extends Seeder
{
    // php artisan db:seed --class=PermissionsSeeder

    public function run()
    {
		DB::table('permissions')->delete();

		$permissions = array(
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


            array(
				'id' => 26,
				'guard_name' => 'web',
				'name' => 'core_hr',
                'parent'=> null,
                'treeview'=> 1
			),
            array(
				'id' => 27,
				'guard_name' => 'web',
				'name' => 'view-calendar',
                'parent'=> 'core_hr',
                'treeview'=> 1
			),
            array(
				'id' => 28,
				'guard_name' => 'web',
				'name' => 'promotion',
                'parent'=> 'core_hr',
                'treeview'=> 1
			),
            array(
				'id' => 29,
				'guard_name' => 'web',
				'name' => 'view-promotion',
                'parent'=> 'promotion',
                'treeview'=> 1
			),
            array(
				'id' => 30,
				'guard_name' => 'web',
				'name' => 'store-promotion',
                'parent'=> 'promotion',
                'treeview'=> 1
			),
            array(
				'id' => 31,
				'guard_name' => 'web',
				'name' => 'edit-promotion',
                'parent'=> 'promotion',
                'treeview'=> 1
			),
            array(
				'id' => 32,
				'guard_name' => 'web',
				'name' => 'delete-promotion',
                'parent'=> 'promotion',
                'treeview'=> 1
			),
            array(
				'id' => 33,
				'guard_name' => 'web',
				'name' => 'award',
                'parent'=> 'core_hr',
                'treeview'=> 1
			),
            array(
				'id' => 34,
				'guard_name' => 'web',
				'name' => 'view-award',
                'parent'=> 'award',
                'treeview'=> 1
			),
            array(
				'id' => 35,
				'guard_name' => 'web',
				'name' => 'store-award',
                'parent'=> 'award',
                'treeview'=> 1
			),
            array(
				'id' => 36,
				'guard_name' => 'web',
				'name' => 'edit-award',
                'parent'=> 'award',
                'treeview'=> 1
			),
            array(
				'id' => 37,
				'guard_name' => 'web',
				'name' => 'delete-award',
                'parent'=> 'award',
                'treeview'=> 1
			),

            array(
				'id' => 38,
				'guard_name' => 'web',
				'name' => 'transfer',
                'parent'=> 'core_hr',
                'treeview'=> 1
			),
            array(
				'id' => 39,
				'guard_name' => 'web',
				'name' => 'view-transfer',
                'parent'=> 'transfer',
                'treeview'=> 1
			),
            array(
				'id' => 40,
				'guard_name' => 'web',
				'name' => 'store-transfer',
                'parent'=> 'transfer',
                'treeview'=> 1
			),
            array(
				'id' => 41,
				'guard_name' => 'web',
				'name' => 'edit-transfer',
                'parent'=> 'transfer',
                'treeview'=> 1
			),
            array(
				'id' => 42,
				'guard_name' => 'web',
				'name' => 'delete-transfer',
                'parent'=> 'transfer',
                'treeview'=> 1
			),

            array(
				'id' => 43,
				'guard_name' => 'web',
				'name' => 'travel',
                'parent'=> 'core_hr',
                'treeview'=> 1
			),
			array(
				'id' => 44,
				'guard_name' => 'web',
				'name' => 'view-travel',
                'parent'=> 'travel',
                'treeview'=> 1
			),
			array(
				'id' => 45,
				'guard_name' => 'web',
				'name' => 'store-travel',
                'parent'=> 'travel',
                'treeview'=> 1
			),
			array(
				'id' => 46,
				'guard_name' => 'web',
				'name' => 'edit-travel',
                'parent'=> 'travel',
                'treeview'=> 1
			),
			array(
				'id' => 47,
				'guard_name' => 'web',
				'name' => 'delete-travel',
                'parent'=> 'travel',
                'treeview'=> 1
			),
            array(
				'id' => 48,
				'guard_name' => 'web',
				'name' => 'resignation',
                'parent'=> 'core_hr',
                'treeview'=> 1
			),
			array(
				'id' => 49,
				'guard_name' => 'web',
				'name' => 'view-resignation',
                'parent'=> 'resignation',
                'treeview'=> 1
			),
			array(
				'id' => 50,
				'guard_name' => 'web',
				'name' => 'store-resignation',
                'parent'=> 'resignation',
                'treeview'=> 1
			),
			array(
				'id' => 51,
				'guard_name' => 'web',
				'name' => 'edit-resignation',
                'parent'=> 'resignation',
                'treeview'=> 1
			),
			array(
				'id' => 52,
				'guard_name' => 'web',
				'name' => 'delete-resignation',
                'parent'=> 'resignation',
                'treeview'=> 1
			),
	        array(
				'id' => 53,
				'guard_name' => 'web',
				'name' => 'complaint',
                'parent'=> 'core_hr',
                'treeview'=> 1
			),
			array(
				'id' => 54,
				'guard_name' => 'web',
				'name' => 'view-complaint',
                'parent'=> 'complaint',
                'treeview'=> 1
			),
			array(
				'id' => 55,
				'guard_name' => 'web',
				'name' => 'store-complaint',
                'parent'=> 'complaint',
                'treeview'=> 1
			),
			array(
				'id' => 56,
				'guard_name' => 'web',
				'name' => 'edit-complaint',
                'parent'=> 'complaint',
                'treeview'=> 1
			),
			array(
				'id' => 57,
				'guard_name' => 'web',
				'name' => 'delete-complaint',
                'parent'=> 'complaint',
                'treeview'=> 1
			),

            array(
				'id' => 58,
				'guard_name' => 'web',
				'name' => 'warning',
                'parent'=> 'core_hr',
                'treeview'=> 1
			),
			array(
				'id' => 59,
				'guard_name' => 'web',
				'name' => 'view-warning',
                'parent'=> 'warning',
                'treeview'=> 1
			),
			array(
				'id' => 60,
				'guard_name' => 'web',
				'name' => 'store-warning',
                'parent'=> 'warning',
                'treeview'=> 1
			),
			array(
				'id' => 61,
				'guard_name' => 'web',
				'name' => 'edit-warning',
                'parent'=> 'warning',
                'treeview'=> 1
			),
			array(
				'id' => 62,
				'guard_name' => 'web',
				'name' => 'delete-warning',
                'parent'=> 'warning',
                'treeview'=> 1
			),
            array(
				'id' => 63,
				'guard_name' => 'web',
				'name' => 'termination',
                'parent'=> 'core_hr',
                'treeview'=> 1
			),
			array(
				'id' => 64,
				'guard_name' => 'web',
				'name' => 'view-termination',
                'parent'=> 'termination',
                'treeview'=> 1
			),
			array(
				'id' => 65,
				'guard_name' => 'web',
				'name' => 'store-termination',
                'parent'=> 'termination',
                'treeview'=> 1
			),
			array(
				'id' => 66,
				'guard_name' => 'web',
				'name' => 'edit-termination',
                'parent'=> 'termination',
                'treeview'=> 1
			),
			array(
				'id' => 67,
				'guard_name' => 'web',
				'name' => 'delete-termination',
                'parent'=> 'termination',
                'treeview'=> 1
			),
            // Timesheet
			array(
				'id' => 68,
				'guard_name' => 'web',
				'name' => 'timesheet',
                'parent'=> null,
                'treeview'=> 1
			),

            array(
				'id' => 69,
				'guard_name' => 'web',
				'name' => 'attendance',
                'parent'=> 'timesheet',
                'treeview'=> 1
			),
			array(
				'id' => 70,
				'guard_name' => 'web',
				'name' => 'view-attendance',
                'parent'=> 'attendance',
                'treeview'=> 1
			),
			array(
				'id' => 71,
				'guard_name' => 'web',
				'name' => 'edit-attendance',
                'parent'=> 'attendance',
                'treeview'=> 1
			),
            array(
				'id' => 72,
				'guard_name' => 'web',
				'name' => 'delete-attendance',
                'parent'=> 'attendance',
                'treeview'=> 1
			),
            array(
				'id' => 73,
				'guard_name' => 'web',
				'name' => 'import-attendance',
                'parent'=> 'attendance',
                'treeview'=> 1
			),

			array(
				'id' => 74,
				'guard_name' => 'web',
				'name' => 'office_shift',
                'parent'=> 'timesheet',
                'treeview'=> 1
			),
			array(
				'id' => 75,
				'guard_name' => 'web',
				'name' => 'view-office_shift',
                'parent'=> 'office_shift',
                'treeview'=> 1
			),
			array(
				'id' => 76,
				'guard_name' => 'web',
				'name' => 'store-office_shift',
                'parent'=> 'office_shift',
                'treeview'=> 1
			),
			array(
				'id' => 77,
				'guard_name' => 'web',
				'name' => 'edit-office_shift',
                'parent'=> 'office_shift',
                'treeview'=> 1
			),
			array(
				'id' => 78,
				'guard_name' => 'web',
				'name' => 'delete-office_shift',
                'parent'=> 'office_shift',
                'treeview'=> 1
			),
			array(
				'id' => 79,
				'guard_name' => 'web',
				'name' => 'holiday',
                'parent'=> 'timesheet',
                'treeview'=> 1
			),
			array(
				'id' => 80,
				'guard_name' => 'web',
				'name' => 'view-holiday',
                'parent'=> 'holiday',
                'treeview'=> 1
			),
			array(
				'id' => 81,
				'guard_name' => 'web',
				'name' => 'store-holiday',
                'parent'=> 'holiday',
                'treeview'=> 1
			),
			array(
				'id' => 82,
				'guard_name' => 'web',
				'name' => 'edit-holiday',
                'parent'=> 'holiday',
                'treeview'=> 1
			),
			array(
				'id' => 83,
				'guard_name' => 'web',
				'name' => 'delete-holiday',
                'parent'=> 'holiday',
                'treeview'=> 1
			),
			array(
				'id' => 84,
				'guard_name' => 'web',
				'name' => 'leave',
                'parent'=> 'timesheet',
                'treeview'=> 1
			),
			array(
				'id' => 85,
				'guard_name' => 'web',
				'name' => 'view-leave',
                'parent'=> 'leave',
                'treeview'=> 1
			),
			array(
				'id' => 86,
				'guard_name' => 'web',
				'name' => 'store-leave',
                'parent'=> 'leave',
                'treeview'=> 1
			),
			array(
				'id' => 87,
				'guard_name' => 'web',
				'name' => 'edit-leave',
                'parent'=> 'leave',
                'treeview'=> 1
			),
			array(
				'id' => 88,
				'guard_name' => 'web',
				'name' => 'delete-leave',
                'parent'=> 'leave',
                'treeview'=> 1
			),


			// array(
			// 	'id' => 12,
			// 	'guard_name' => 'web',
			// 	'name' => 'role-access',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 13,
			// 	'guard_name' => 'web',
			// 	'name' => 'general-setting',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 14,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-general-setting',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 15,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-general-setting',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 16,
			// 	'guard_name' => 'web',
			// 	'name' => 'mail-setting',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 17,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-mail-setting',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 18,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-mail-setting',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 19,
			// 	'guard_name' => 'web',
			// 	'name' => 'language-setting',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),



            // array(
			// 	'id' => 5,
			// 	'guard_name' => 'web',
			// 	'name' => 'last-login-user',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 6,
			// 	'guard_name' => 'web',
			// 	'name' => 'role-access-user',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),

			// array(
			// 	'id' => 20,
			// 	'guard_name' => 'web',
			// 	'name' => 'core_hr',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 21,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-calendar',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 22,
			// 	'guard_name' => 'web',
			// 	'name' => 'promotion',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 23,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-promotion',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 24,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-promotion',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 25,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-promotion',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 26,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-promotion',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 27,
			// 	'guard_name' => 'web',
			// 	'name' => 'award',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 28,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-award',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 29,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-award',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 30,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-award',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 31,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-award',
            //     'parent'=> null,
            //     'treeview'=> 1
            // ),
			// array(
			// 	'id' => 32,
			// 	'guard_name' => 'web',
			// 	'name' => 'transfer',
            //     'parent'=> null,
            //     'treeview'=> 1
            // ),
			// array(
			// 	'id' => 33,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-transfer',
            //     'parent'=> null,
            //     'treeview'=> 1
            // ),
			// array(
			// 	'id' => 34,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-transfer',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 35,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-transfer',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 36,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-transfer',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),





			// array(
			// 	'id' => 62,
			// 	'guard_name' => 'web',
			// 	'name' => 'timesheet',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),

			// array(
			// 	'id' => 81,
			// 	'guard_name' => 'web',
			// 	'name' => 'payment-module',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 82,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-payslip',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 83,
			// 	'guard_name' => 'web',
			// 	'name' => 'make-payment',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 84,
			// 	'guard_name' => 'web',
			// 	'name' => 'make-bulk_payment',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 85,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-paylist',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 86,
			// 	'guard_name' => 'web',
			// 	'name' => 'set-salary',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 87,
			// 	'guard_name' => 'web',
			// 	'name' => 'hr_report',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 88,
			// 	'guard_name' => 'web',
			// 	'name' => 'report-payslip',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 89,
			// 	'guard_name' => 'web',
			// 	'name' => 'report-attendance',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 90,
			// 	'guard_name' => 'web',
			// 	'name' => 'report-training',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 91,
			// 	'guard_name' => 'web',
			// 	'name' => 'report-project',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 92,
			// 	'guard_name' => 'web',
			// 	'name' => 'report-task',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 93,
			// 	'guard_name' => 'web',
			// 	'name' => 'report-employee',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 94,
			// 	'guard_name' => 'web',
			// 	'name' => 'report-account',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 95,
			// 	'guard_name' => 'web',
			// 	'name' => 'report-deposit',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 96,
			// 	'guard_name' => 'web',
			// 	'name' => 'report-expense',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 97,
			// 	'guard_name' => 'web',
			// 	'name' => 'report-transaction',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 98,
			// 	'guard_name' => 'web',
			// 	'name' => 'recruitment',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 99,
			// 	'guard_name' => 'web',
			// 	'name' => 'job_employer',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 100,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-job_employer',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 101,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-job_employer',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 102,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-job_employer',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 103,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-job_employer',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 104,
			// 	'guard_name' => 'web',
			// 	'name' => 'job_post',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 105,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-job_post',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 106,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-job_post',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 107,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-job_post',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 108,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-job_post',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 109,
			// 	'guard_name' => 'web',
			// 	'name' => 'job_candidate',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 110,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-job_candidate',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 111,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-job_candidate',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 112,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-job_candidate',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 113,
			// 	'guard_name' => 'web',
			// 	'name' => 'job_interview',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 114,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-job_interview',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 115,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-job_interview',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 116,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-job_interview',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 117,
			// 	'guard_name' => 'web',
			// 	'name' => 'project-management',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 118,
			// 	'guard_name' => 'web',
			// 	'name' => 'project',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 119,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-project',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 120,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-project',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 121,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-project',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 122,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-project',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 123,
			// 	'guard_name' => 'web',
			// 	'name' => 'task',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 124,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-task',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 125,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-task',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 126,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-task',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 127,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-task',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 128,
			// 	'guard_name' => 'web',
			// 	'name' => 'client',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 129,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-client',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 130,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-client',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 131,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-client',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 132,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-client',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 133,
			// 	'guard_name' => 'web',
			// 	'name' => 'invoice',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 134,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-invoice',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 135,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-invoice',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 136,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-invoice',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 137,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-invoice',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 138,
			// 	'guard_name' => 'web',
			// 	'name' => 'ticket',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 139,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-ticket',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 140,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-ticket',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 141,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-ticket',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 142,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-ticket',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 143,
			// 	'guard_name' => 'web',
			// 	'name' => 'import-module',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),


			// array(
			// 	'id' => 146,
			// 	'guard_name' => 'web',
			// 	'name' => 'file_module',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 147,
			// 	'guard_name' => 'web',
			// 	'name' => 'file_manager',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 148,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-file_manager',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 149,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-file_manager',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 150,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-file_manager',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 151,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-file_manager',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 152,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-file_config',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 153,
			// 	'guard_name' => 'web',
			// 	'name' => 'official_document',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 154,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-official_document',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 155,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-official_document',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 156,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-official_document',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 157,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-official_document',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 158,
			// 	'guard_name' => 'web',
			// 	'name' => 'event-meeting',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 159,
			// 	'guard_name' => 'web',
			// 	'name' => 'meeting',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 160,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-meeting',
            //     'parent'=> null,
            //     'treeview'=> 1
			// ),
			// array(
			// 	'id' => 161,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-meeting'
			// ),
			// array(
			// 	'id' => 162,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-meeting'
			// ),
			// array(
			// 	'id' => 163,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-meeting'
			// ),
			// array(
			// 	'id' => 164,
			// 	'guard_name' => 'web',
			// 	'name' => 'event'
			// ),
			// array(
			// 	'id' => 165,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-event'
			// ),
			// array(
			// 	'id' => 166,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-event'
			// ),
			// array(
			// 	'id' => 167,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-event'
			// ),
			// array(
			// 	'id' => 168,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-event'
			// ),

			// array(
			// 	'id' => 174,
			// 	'guard_name' => 'web',
			// 	'name' => 'assign-module'
			// ),
			// array(
			// 	'id' => 175,
			// 	'guard_name' => 'web',
			// 	'name' => 'assign-role'
			// ),
			// array(
			// 	'id' => 176,
			// 	'guard_name' => 'web',
			// 	'name' => 'assign-ticket'
			// ),
			// array(
			// 	'id' => 177,
			// 	'guard_name' => 'web',
			// 	'name' => 'assign-project'
			// ),
			// array(
			// 	'id' => 178,
			// 	'guard_name' => 'web',
			// 	'name' => 'assign-task'
			// ),
			// array(
			// 	'id' => 179,
			// 	'guard_name' => 'web',
			// 	'name' => 'finance'
			// ),
			// array(
			// 	'id' => 180,
			// 	'guard_name' => 'web',
			// 	'name' => 'account'
			// ),
			// array(
			// 	'id' => 181,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-account'
			// ),
			// array(
			// 	'id' => 182,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-account'
			// ),
			// array(
			// 	'id' => 183,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-account'
			// ),
			// array(
			// 	'id' => 184,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-account'
			// ),
			// array(
			// 	'id' => 185,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-transaction'
			// ),
			// array(
			// 	'id' => 186,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-balance_transfer'
			// ),
			// array(
			// 	'id' => 187,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-balance_transfer'
			// ),
			// array(
			// 	'id' => 188,
			// 	'guard_name' => 'web',
			// 	'name' => 'expense'
			// ),
			// array(
			// 	'id' => 189,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-expense'
			// ),
			// array(
			// 	'id' => 190,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-expense'
			// ),
			// array(
			// 	'id' => 191,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-expense'
			// ),
			// array(
			// 	'id' => 192,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-expense'
			// ),
			// array(
			// 	'id' => 193,
			// 	'guard_name' => 'web',
			// 	'name' => 'deposit'
			// ),
			// array(
			// 	'id' => 194,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-deposit'
			// ),
			// array(
			// 	'id' => 195,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-deposit'
			// ),
			// array(
			// 	'id' => 196,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-deposit'
			// ),
			// array(
			// 	'id' => 197,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-deposit'
			// ),
			// array(
			// 	'id' => 198,
			// 	'guard_name' => 'web',
			// 	'name' => 'payer'
			// ),
			// array(
			// 	'id' => 199,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-payer'
			// ),
			// array(
			// 	'id' => 200,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-payer'
			// ),
			// array(
			// 	'id' => 201,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-payer'
			// ),
			// array(
			// 	'id' => 202,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-payer'
			// ),
			// array(
			// 	'id' => 203,
			// 	'guard_name' => 'web',
			// 	'name' => 'payee'
			// ),
			// array(
			// 	'id' => 204,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-payee'
			// ),
			// array(
			// 	'id' => 205,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-payee'
			// ),
			// array(
			// 	'id' => 206,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-payee'
			// ),
			// array(
			// 	'id' => 207,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-payee'
			// ),
			// array(
			// 	'id' => 208,
			// 	'guard_name' => 'web',
			// 	'name' => 'training_module'
			// ),
			// array(
			// 	'id' => 209,
			// 	'guard_name' => 'web',
			// 	'name' => 'trainer'
			// ),
			// array(
			// 	'id' => 210,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-trainer'
			// ),
			// array(
			// 	'id' => 211,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-trainer'
			// ),
			// array(
			// 	'id' => 212,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-trainer'
			// ),
			// array(
			// 	'id' => 213,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-trainer'
			// ),
			// array(
			// 	'id' => 214,
			// 	'guard_name' => 'web',
			// 	'name' => 'training'
			// ),
			// array(
			// 	'id' => 215,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-training'
			// ),
			// array(
			// 	'id' => 216,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-training'
			// ),
			// array(
			// 	'id' => 217,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-training'
			// ),
			// array(
			// 	'id' => 218,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-training'
			// ),
			// array(
			// 	'id' => 219,
			// 	'guard_name' => 'web',
			// 	'name' => 'access-module'
			// ),
			// array(
			// 	'id' => 220,
			// 	'guard_name' => 'web',
			// 	'name' => 'access-variable_type'
			// ),
			// array(
			// 	'id' => 221,
			// 	'guard_name' => 'web',
			// 	'name' => 'access-variable_method'
			// ),
			// array(
			// 	'id' => 222,
			// 	'guard_name' => 'web',
			// 	'name' => 'access-language'
			// ),
			// array(
			// 	'id' => 223,
			// 	'guard_name' => 'web',
			// 	'name' => 'announcement'
			// ),
			// array(
			// 	'id' => 224,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-announcement'
			// ),
			// array(
			// 	'id' => 225,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-announcement'
			// ),
			// array(
			// 	'id' => 226,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-announcement'
			// ),
			// array(
			// 	'id' => 227,
			// 	'guard_name' => 'web',
			// 	'name' => 'company'
			// ),
			// array(
			// 	'id' => 228,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-company'
			// ),
			// array(
			// 	'id' => 229,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-company'
			// ),
			// array(
			// 	'id' => 230,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-company'
			// ),
			// array(
			// 	'id' => 231,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-company'
			// ),
			// array(
			// 	'id' => 232,
			// 	'guard_name' => 'web',
			// 	'name' => 'department'
			// ),
			// array(
			// 	'id' => 233,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-department'
			// ),
			// array(
			// 	'id' => 234,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-department'
			// ),
			// array(
			// 	'id' => 235,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-department'
			// ),
			// array(
			// 	'id' => 236,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-department'
			// ),
			// array(
			// 	'id' => 237,
			// 	'guard_name' => 'web',
			// 	'name' => 'designation'
			// ),
			// array(
			// 	'id' => 238,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-designation'
			// ),
			// array(
			// 	'id' => 239,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-designation'
			// ),
			// array(
			// 	'id' => 240,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-designation'
			// ),
			// array(
			// 	'id' => 241,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-designation'
			// ),
			// array(
			// 	'id' => 242,
			// 	'guard_name' => 'web',
			// 	'name' => 'location'
			// ),
			// array(
			// 	'id' => 243,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-location'
			// ),
			// array(
			// 	'id' => 244,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-location'
			// ),
			// array(
			// 	'id' => 245,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-location'
			// ),
			// array(
			// 	'id' => 246,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-location'
			// ),
			// array(
			// 	'id' => 247,
			// 	'guard_name' => 'web',
			// 	'name' => 'policy'
			// ),
			// array(
			// 	'id' => 248,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-policy'
			// ),
			// array(
			// 	'id' => 249,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-policy'
			// ),
			// array(
			// 	'id' => 250,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-policy'
			// ),
			// array(
			// 	'id' => 251,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-cms'
			// ),
			// array(
			// 	'id' => 252,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-cms'
			// ),
			// array(
			// 	'id' => 253,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-user'
			// ),


			// array(
			// 	'id' => 259,
			// 	'guard_name' => 'web',
			// 	'name' => 'cms'
			// ),

            // //Performance
            // array(
			// 	'id' => 260,
			// 	'guard_name' => 'web',
			// 	'name' => 'performance'
			// ),
            // array(
			// 	'id' => 261,
			// 	'guard_name' => 'web',
			// 	'name' => 'goal-type'
			// ),
            // array(
			// 	'id' => 262,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-goal-type'
			// ),
            // array(
			// 	'id' => 263,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-goal-type'
			// ),
            // array(
			// 	'id' => 264,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-goal-type'
			// ),
            // array(
			// 	'id' => 265,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-goal-type'
			// ),
            // array(
			// 	'id' => 266,
			// 	'guard_name' => 'web',
			// 	'name' => 'goal-tracking'
			// ),
            // array(
			// 	'id' => 267,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-goal-tracking'
			// ),
            // array(
			// 	'id' => 268,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-goal-tracking'
			// ),
            // array(
			// 	'id' => 269,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-goal-tracking'
			// ),
            // array(
			// 	'id' => 270,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-goal-tracking'
			// ),
            // array(
			// 	'id' => 271,
			// 	'guard_name' => 'web',
			// 	'name' => 'indicator'
			// ),
            // array(
			// 	'id' => 272,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-indicator'
			// ),
            // array(
			// 	'id' => 273,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-indicator'
			// ),
            // array(
			// 	'id' => 274,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-indicator'
			// ),
            // array(
			// 	'id' => 275,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-indicator'
			// ),
            // array(
			// 	'id' => 276,
			// 	'guard_name' => 'web',
			// 	'name' => 'appraisal'
			// ),
            // array(
			// 	'id' => 277,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-appraisal'
			// ),
            // array(
			// 	'id' => 278,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-appraisal'
			// ),
            // array(
			// 	'id' => 279,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-appraisal'
			// ),
            // array(
			// 	'id' => 280,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-appraisal'
			// ),

			// //assetes and category
			// array(
			// 	'id' => 281,
			// 	'guard_name' => 'web',
			// 	'name' => 'assets-and-category'
			// ),
			// array(
			// 	'id' => 282,
			// 	'guard_name' => 'web',
			// 	'name' => 'category'
			// ),
			// array(
			// 	'id' => 283,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-assets-category'
			// ),
			// array(
			// 	'id' => 284,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-assets-category'
			// ),
			// array(
			// 	'id' => 285,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-assets-category'
			// ),
			// array(
			// 	'id' => 286,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-assets-category'
			// ),
			// array(
			// 	'id' => 287,
			// 	'guard_name' => 'web',
			// 	'name' => 'assets'
			// ),
			// array(
			// 	'id' => 288,
			// 	'guard_name' => 'web',
			// 	'name' => 'view-assets'
			// ),
			// array(
			// 	'id' => 289,
			// 	'guard_name' => 'web',
			// 	'name' => 'store-assets'
			// ),
			// array(
			// 	'id' => 290,
			// 	'guard_name' => 'web',
			// 	'name' => 'edit-assets'
			// ),
			// array(
			// 	'id' => 291,
			// 	'guard_name' => 'web',
			// 	'name' => 'delete-assets'
			// ),
            // array(
			// 	'id' => 292,
			// 	'guard_name' => 'web',
			// 	'name' => 'daily-attendances'
			// ),
            // array(
			// 	'id' => 293,
			// 	'guard_name' => 'web',
			// 	'name' => 'date-wise-attendances'
			// ),
            // array(
			// 	'id' => 294,
			// 	'guard_name' => 'web',
			// 	'name' => 'monthly-attendances'
			// ),
            // // New Added

            // array(
			// 	'id' => 296,
			// 	'guard_name' => 'web',
			// 	'name' => 'get-leave-notification'
			// ),
            // array(
			// 	'id' => 297,
			// 	'guard_name' => 'web',
			// 	'name' => 'report-pension'
			// ),
		);
		DB::table('permissions')->insert($permissions);
    }
}



