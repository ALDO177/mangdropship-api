<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\SubCategoryProduct;
use App\Models\SubCategorys;
use Faker\Factory;
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
        SubCategorys::all()->map(function($collect) use($faker){
            SubCategoryProduct::create([
                'id_sub_category' => $collect->id,
                'id_product'      => $faker->randomElement(Produk::all())['id']
            ]);
        });
    }
}
