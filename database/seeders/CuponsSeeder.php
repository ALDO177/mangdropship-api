<?php

namespace Database\Seeders;

use App\Models\Cupons;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cupons::factory()->count('10')->create();
    }
}
