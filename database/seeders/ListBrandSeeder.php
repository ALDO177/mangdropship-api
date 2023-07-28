<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\ListBrandProduk;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ListBrandSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $brand =[
            ['Aldo Brand', 'top'],
            ['Executiv Brnd', 'bottom']
        ];

        foreach($brand as $values){
            ListBrandProduk::create([
                'id_suplier' => '01d8b2bd-2e84-4eda-b6be-e75d43181254',
                'merk_name'  => $values[0],
                'status'     => true,
                'position'   => $values[1],
                'path'       => $faker->imageUrl(300, 300)
            ]);
        }
    }
}
