<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions
         Permission::create(['name' => 'adminpermission']);
         Permission::create(['name' => 'userpermission']);
 
         // create roles and assign created permissions
         $role = Role::create(['name' => 'super-admin']);
         $role->givePermissionTo(Permission::all());
 
         $role = Role::create(['name' => 'user']);
         $role->givePermissionTo('userpermission');
 
     }
    
}
