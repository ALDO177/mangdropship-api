<?php

namespace Database\Seeders;

use App\Models\GalleriesProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleriesProductSeeder extends Seeder
{
    public function run()
    {
        GalleriesProduct::factory()->count(50)->create();
    }
}
