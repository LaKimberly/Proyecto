<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        //User
        $user_permissions = $admin_permissions->filter(function($permission){
            return substr($permission->name, 0, 5) != 'user_' && 
            substr($permission->name, 0, 5) != 'role_'&& 
            substr($permission->name, 0, 11) != 'permission_'&& //el número se toma dependiendo del tamaño de la cadena permission_ = 11 caracteres
            substr($permission->name, 0, 12) != 'product_edit'&& 
            substr($permission->name, 0, 14) != 'product_create'&& 
            substr($permission->name, 0, 15) != 'product_destroy'&&
            substr($permission->name, 0, 9) != 'delivery_'; 
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
