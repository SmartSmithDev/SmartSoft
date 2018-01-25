<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        
        Permission::create(['name' => 'users_manage']);
        Permission::create(['name' => 'payments_manage']);
        Permission::create(['name' => 'create_sales_purchase']);
        Permission::create(['name' => 'manage_tax']);
        Permission::create(['name' => 'view_reports']);
        Permission::create(['name' => 'companies_manage']);
        Permission::create(['name' => 'vendors_manage']);
        Permission::create(['name' => 'customers_manage']);

    }
}
