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
    }
}
