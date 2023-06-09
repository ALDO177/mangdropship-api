<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\MangSellers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MangsellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MangSellers::create([
            'name'     => 'Mangdropship Sellers',
            'email'    => 'MangdropshipSellers@gmail.com',
            'password' =>  'Mang12345'
        ]);
    }
}
