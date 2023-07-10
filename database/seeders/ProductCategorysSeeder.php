<?php

namespace Database\Seeders;

use App\Models\ProductCategorys;
use App\Models\Produk;
use App\Models\SubCategorys;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategorys::factory()->count(10)->create();
    }
}
