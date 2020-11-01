<?php

use Illuminate\Database\Seeder;

class Product_ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Product_Review::create([
            'rating' => 4,
            'review' => 'this is test',
            'product_id' => 1,
        ]);

        App\Models\Product_Review::create([
            'rating' => 5,
            'review' => 'this is test',
            'product_id' => 1,
        ]);

        App\Models\Product_Review::create([
            'rating' => 4.5,
            'review' => 'this is test',
            'product_id' => 1,
        ]);

        App\Models\Product_Review::create([
            'rating' => 5,
            'review' => 'this is test',
            'product_id' => 1,
        ]);

        App\Models\Product_Review::create([
            'rating' => 4.2,
            'review' => 'this is test',
            'product_id' => 1,
        ]);

        App\Models\Product_Review::create([
            'rating' => 4.5,
            'review' => 'this is test',
            'product_id' => 3,
        ]);

        App\Models\Product_Review::create([
            'rating' => 5,
            'review' => 'this is test',
            'product_id' => 3,
        ]);

        App\Models\Product_Review::create([
            'rating' => 4.2,
            'review' => 'this is test',
            'product_id' => 2,
        ]);
    }
}
