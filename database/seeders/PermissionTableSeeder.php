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
        'product_view',
        'product_create',
        'product_edit',
        'product_delete',

        'category_view',
        'category_create',
        'category_edit',
        'category_delete',

        'brand_view',
        'brand_create',
        'brand_edit',
        'brand_delete',

        'quote_view',
        'quote_create',
        'quote_edit',
        'quote_delete',

        'role_view',
        'role_create',
        'role_edit',
        'role_delete',

        'user_view',
        'user_create',
        'user_edit',
        'user_delete',
      ];
   
      foreach ($permissions as $permission) {
           Permission::create(['name' => $permission]);
      }
    }
}
