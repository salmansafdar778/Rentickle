<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Category::create([
            'name' => 'Bed Room',
            'image' => 'https://3.imimg.com/data3/IK/EV/MY-3306470/1486797_603689049738302_6642958849060908258_n-500x500.jpg'
        ]);

        App\Models\Category::create([
            'name' => 'Living Room',
            'image' => 'https://3.imimg.com/data3/VE/RW/MY-3306470/11140339_491773827661834_7043748747920351792_n-500x500.jpg'
        ]);

        App\Models\Category::create([
            'name' => 'DSLR Camera',
            'image' => 'https://3.imimg.com/data3/BL/MG/MY-3306470/11178322_491773847661832_6025968662441639271_n-500x500.jpg'
        ]);


        App\Models\Category::create([
            'name' => 'Appliances',
            'image' => 'https://3.imimg.com/data3/IK/EV/MY-3306470/1486797_603689049738302_6642958849060908258_n-500x500.jpg'
        ]);

        App\Models\Category::create([
            'name' => 'Storages',
            'image' => 'https://3.imimg.com/data3/VE/RW/MY-3306470/11140339_491773827661834_7043748747920351792_n-500x500.jpg'
        ]);

        App\Models\Category::create([
            'name' => 'Packages',
            'image' => 'https://3.imimg.com/data3/BL/MG/MY-3306470/11178322_491773847661832_6025968662441639271_n-500x500.jpg'
        ]);

    }
}
