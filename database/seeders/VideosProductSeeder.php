<?php

namespace Database\Seeders;

use App\Models\VideosProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideosProductSeeder extends Seeder
{
    public function run()
    {
        VideosProduct::factory()->count(50)->create();
    }
}
