<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\SuplierAccountBank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuplierAccountBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SuplierAccountBank::factory()->count(10)->create();
    }
}
