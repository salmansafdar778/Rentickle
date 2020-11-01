<?php

use Illuminate\Database\Seeder;

class Product_SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Product_Size::create([
            'name' => '6x3',
            'size' => '6x3',
            'product_id' => 1,
        ]);

        App\Models\Product_Size::create([
            'name' => '6x4',
            'size' => '6x4',
            'product_id' => 1,
        ]);

        App\Models\Product_Size::create([
            'name' => '6x5',
            'size' => '6x5',
            'product_id' => 1,
        ]);

        App\Models\Product_Size::create([
            'name' => '6x6',
            'size' => '6x6',
            'product_id' => 1,
        ]);
    }
}
