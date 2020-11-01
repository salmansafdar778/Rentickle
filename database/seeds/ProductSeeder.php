<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Product::create([
            'name' => 'Sofa Baleria',
            'price_per_month' => 799,
            'currency' => '$',
            'price_36_month' => 5039,
            'refundable_deposit' => 1899,
            'category_id' => 1,
            'image' => 'https://image.shutterstock.com/image-illustration/gray-3d-interior-composition-600w-72041347.jpg',
        ]);

        App\Models\Product::create([
            'name' => 'Dinning Table',
            'price_per_month' => 599,
            'currency' => '$',
            'price_36_month' => 5039,
            'refundable_deposit' => 1299,
            'category_id' => 1,
            'image' => 'https://image.shutterstock.com/image-illustration/gray-3d-interior-composition-600w-72041347.jpg',
        ]);

        App\Models\Product::create([
            'name' => 'Fabric Sofa',
            'price_per_month' => 699,
            'currency' => '$',
            'price_36_month' => 5039,
            'refundable_deposit' => 1899,
            'category_id' => 1,
            'image' => 'https://image.shutterstock.com/image-illustration/gray-3d-interior-composition-600w-72041347.jpg',
        ]);

        App\Models\Product::create([
            'name' => 'Bed Sofa',
            'price_per_month' => 999,
            'currency' => '$',
            'price_36_month' => 5049,
            'refundable_deposit' => 1889,
            'category_id' => 1,
            'image' => 'https://image.shutterstock.com/image-illustration/gray-3d-interior-composition-600w-72041347.jpg',
        ]);
    }
}
