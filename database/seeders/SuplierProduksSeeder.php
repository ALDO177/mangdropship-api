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
        // suplierProduks::factory()->count(20)->create();
        suplierProduks::create([
            'id_suplier' => '80cdcab0-973f-407e-8a63-aaa79213dd5a',
            'id_product' => 'a355e6f7-6678-4696-879f-406d44defdc9'
        ]);

        // suplierProduks::create([
        //     'id_suplier' => Supllier::all()->toArray()[1]['id'],
        //     'id_product' => Produk::all()[1]['id']
        // ]);
    }
}
