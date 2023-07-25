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
                'id_suplier'  => '96c261a4-70dc-4c9c-add7-7df43b6ab4c6',
                'name_brand'  => $values,
                'path_img'    => $faker->imageUrl()
            ]);
        }
    }
}
