<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\Store;
use App\Models\Supllier;
use Database\Factories\SupllierFactory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupllierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Supllier::factory()->count(10)->create();
        $faker = Factory::create();
        Supllier::create([
            'id_sellers' => 1,
            'id_store'   =>  $faker->randomElement(Store::all())['id'],
        ]);

        Supllier::create([
            'id_sellers' => 2,
            'id_store'   =>  $faker->randomElement(Store::all())['id'],
        ]);
    }
}
