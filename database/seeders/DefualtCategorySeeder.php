<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DefualtCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Create Defualt Brand
      Category::create([
        'category_name' => 'Uncategory',
        'category_code' => 'not set',
        'category_note' => 'Defualt Category',
        'created_by_id' => '1',
        'created_by_name' => 'System',
      ]);
    }
}
