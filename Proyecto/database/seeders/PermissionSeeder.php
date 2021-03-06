<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'permission_index',
            'permission_create',
            'permission_show',
            'permission_edit',
            'permission_destroy',

            'role_index',
            'role_create',
            'role_show',
            'role_edit',
            'role_destroy',

            'product_index',
            'product_create',
            'product_show',
            'product_edit',
            'product_destroy',

            'delivery_index',
            'delivery_create',
            'delivery_show',
            'delivery_edit',
            'delivery_destroy',

            'user_index',
            'user_create',
            'user_show',
            'user_edit',
            'user_destroy',

            'purcharse_index',
            'purcharse_create',
            'purcharse_show',
            'purcharse_edit',
            'purcharse_destroy',
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name'=>$permission
            ]);
        }
    }
}
