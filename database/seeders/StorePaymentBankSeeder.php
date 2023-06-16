<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\StorePaymentBank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorePaymentBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StorePaymentBank::factory()->count(5)->create();
    }
}
