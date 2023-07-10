<?php

namespace Database\Seeders;

use App\Models\Categorys;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorys::factory()->count(10)->create();
    }
}
