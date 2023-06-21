<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\suplierProduks;
use App\Models\Produk;
use App\Models\Supllier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuplierProduksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        suplierProduks::factory()->count(20)->create();
        // suplierProduks::create([
        //     'id_suplier' => Supllier::all()->toArray()[0]['id'],
        //     'id_product' => Produk::all()[0]['id']
        // ]);

        // suplierProduks::create([
        //     'id_suplier' => Supllier::all()->toArray()[1]['id'],
        //     'id_product' => Produk::all()[1]['id']
        // ]);
    }
}
