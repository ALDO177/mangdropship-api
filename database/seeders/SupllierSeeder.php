<?php

namespace Database\Seeders;

use App\Models\Supllier;
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
        Supllier::factory()->count(10)->create();
    }
}
