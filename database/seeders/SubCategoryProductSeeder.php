<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\SubCategoryProduct;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        SubCategoryProduct::create([
            'id_sub_category' => '0b0cb017-17b8-4e46-acdc-4802aa64268e',
            'id_product'      => $faker->randomElement(Produk::all())['id']
        ]);
    }
}
