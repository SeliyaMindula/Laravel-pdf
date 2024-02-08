<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NSProductAttribute; // Make sure to import the NSProductAttribute model
use Illuminate\Support\Facades\DB;


class NSProductAttributeTableSeeder extends Seeder
{
    public function run()
    {
        // Define the dummy data for NSProductAttribute
        DB::table('ns_product_attributes')->insert([
            ['id' => 1,'product_id' => 1, 'color' => 'red','size' => 1],
            ['id' => 2,'product_id' => 2, 'color' => 'black','size' => 3],
            // Add more attributes as needed
        ]);

        
    }
}
