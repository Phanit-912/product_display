<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class DefualtBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Defualt Brand
        Brand::create([
          'brand_name' => 'Unknown',
          'brand_code' => 'Unknown',
          'brand_note' => 'Defualt Brand',
          'created_by_id' => '1',
          'created_by_name' => 'System',
        ]);
    }
}
