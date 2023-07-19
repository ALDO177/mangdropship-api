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
        $brand = ['Super Produk', 'Brand Produk', 'Umkm'];

        foreach($brand as $values){
            ListBrandProduk::create([
                'id_suplier'  => '1249a42c-4b06-482e-aa54-3ffd4d9f8b43',
                'name_brand'  => $values,
                'path_img'    => $faker->imageUrl()
            ]);
        }
    }
}
