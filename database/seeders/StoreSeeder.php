<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\Store;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

const Name_Stored = ['ALDO TOKO JAYA', 'MADO TOKO SEJAHTERA', 'TOKO MUSLIMAH ABADI'];

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Store::factory()->count(5)->create();
        $faker = Factory::create();

        Store::create([
            'name_store' => Name_Stored[0],
            "slugh_store"  => Str::slug(Name_Stored[0]),
            "path_store"   => $faker->imageUrl(300, 300, 'dog', true, 'Hello World'),
            "store_status" => $faker->boolean(),
        ]);

        Store::create([
            'name_store' => Name_Stored[1],
            "slugh_store"  => Str::slug(Name_Stored[1]),
            "path_store"   => $faker->imageUrl(300, 300, 'dog', true, 'Hello World'),
            "store_status" => $faker->boolean(),
        ]);
    }
}
