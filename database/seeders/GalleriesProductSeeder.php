<?php

namespace Database\Seeders;

use App\Models\GalleriesProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleriesProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GalleriesProduct::factory()->count(25)->create();
    }
}
