<?php

namespace Database\Seeders;

use App\Models\SubCategorys;
use Illuminate\Database\Seeder;

class SubCategorysSeeder extends Seeder
{
    public function run()
    {
        SubCategorys::factory()->count(200)->create();
    }
}
