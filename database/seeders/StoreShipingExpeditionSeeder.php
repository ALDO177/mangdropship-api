<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\StoreShipingExpedition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreShipingExpeditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StoreShipingExpedition::factory()->count(5)->create();
    }
}
