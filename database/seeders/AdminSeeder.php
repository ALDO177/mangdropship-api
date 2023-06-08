<?php

namespace Database\Seeders;

use App\Models\MangSeller\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name'     => 'Mangdropship Sellers',
            'email'    => 'mangdropshipAdmin@gmail.com',
            'password' => 'Revaband01'
        ]);
    }
}
