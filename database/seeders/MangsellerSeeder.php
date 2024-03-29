<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\MangSellers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MangsellerSeeder extends Seeder
{
    public function run()
    {
        MangSellers::create([
            'name'     => 'Mangdropship Sellers',
            'email'    => 'MangdropshipSellers@gmail.com',
            'password' =>  'Mang12345'
        ]);

        MangSellers::create([
            'name'     => 'Aldo Ratmawan',
            'email'    => 'aldo.ratmawan9999@gmail.com',
            'password' =>  'aldo12345'
        ]);
    }
}
