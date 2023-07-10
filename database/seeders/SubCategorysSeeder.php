<?php

namespace Database\Seeders;

use App\Models\Categorys;
use App\Models\SubCategorys;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategorys::factory()->count(100)->create();
    }
}
