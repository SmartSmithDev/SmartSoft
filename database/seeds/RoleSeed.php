<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('users_manage');
        $role->givePermissionTo('payments_manage');
        $role->givePermissionTo('create_sales_purchase');
        $role->givePermissionTo('manage_tax');
        $role->givePermissionTo('view_reports');
        $role->givePermissionTo('companies_manage');
        $role->givePermissionTo('vendors_manage');
        $role->givePermissionTo('customers_manage');
        $role = Role::create(['name' => 'manager']);
        $role->givePermissionTo('payments_manage');
        $role->givePermissionTo('create_sales_purchase');
        $role->givePermissionTo('manage_tax');
        $role->givePermissionTo('view_reports');
        $role->givePermissionTo('vendors_manage');
        $role->givePermissionTo('customers_manage');
        $role = Role::create(['name' => 'accountant']);
        $role->givePermissionTo('payments_manage');
        $role->givePermissionTo('create_sales_purchase');
        $role->givePermissionTo('manage_tax');
        $role->givePermissionTo('view_reports');
        $role->givePermissionTo('vendors_manage');
        $role->givePermissionTo('customers_manage');
        
    }
}
