<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $permissions = [
         'role_view',
         'role_create',
         'role_edit',
         'role_delete',

         'user_view',
         'user_create',
         'user_edit',
         'user_delete',

         'product_view',
         'product_create',
         'product_edit',
         'product_delete'
      ];
   
      foreach ($permissions as $permission) {
           Permission::create(['name' => $permission]);
      }
    }
}
