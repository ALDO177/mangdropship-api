<?php

namespace Database\Seeders;

use App\Models\Admin\ListMerkProdukSeller;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ListMerkProdukSellerSeeder extends Seeder
{
    public function run()
    {
        $exampleBrand = [
            ['Super Produk', 'bottom'],
            ['Brand Produk', 'top'],
            ['Umkm', 'bottom'],
        ];

        $faker = Factory::create();

        foreach($exampleBrand as $values){
            ListMerkProdukSeller::create([
                'merk_name' => $values[0],
                'status'     => true,
                'position'   => $values[1],
                'path'       => $faker->imageUrl(300, 300)
            ]);
        }
    }
}
