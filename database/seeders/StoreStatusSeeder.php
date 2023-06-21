<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\StoreStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StoreStatus::factory()->count(5)->create();
    }
}
