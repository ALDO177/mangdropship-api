<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\StoreAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StoreAccount::factory()->count(10)->create();
    }
}
