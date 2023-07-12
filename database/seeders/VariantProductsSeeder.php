<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\VariantProducts;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Factory::create();
        $produk = $faker->randomElement(Produk::all())['id'];
        VariantProducts::create([
            'id_product' => $produk,
            'variant_type_name' => 'Warna',
            'variant_options'   =>[
                'variant_select_name' => 'Merah',
                'variant_price' => 10000,
                'variant_quantity' => 20,
                ]
            ]);
            VariantProducts::create([
                'id_product' => $produk,
                'variant_type_name' => 'Warna',
                'variant_options'   =>[
                    'variant_select_name' => 'Hijau',
                    'variant_price' => 9000,
                    'variant_quantity' => 10,
                    ]
                ]);
    }
}
