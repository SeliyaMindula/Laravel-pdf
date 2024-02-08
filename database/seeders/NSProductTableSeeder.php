<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NSProduct; // Import your model
use Illuminate\Support\Facades\DB;


class NSProductTableSeeder extends Seeder
{
    public function run()
    {
        // Using model factory if available (Laravel 8 and newer versions)
        // NSProduct::factory()->count(10)->create();

        // Manual insertion
        DB::table('ns_products')->insert([
            ['code' => 'P001', 'name' => 'Product Name 1'],
            ['code' => 'P002', 'name' => 'Product Name 2'],
            // Add more products as needed
        ]);

        // Alternatively, using DB facade
        // \Illuminate\Support\Facades\DB::table('ns_products')->insert([
        //     ['code' => 'P001', 'name' => 'Product Name 1'],
        //     ['code' => 'P002', 'name' => 'Product Name 2'],
        //     // Add more products as needed
        // ]);
    }
}
