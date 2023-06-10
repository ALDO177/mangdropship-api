<?php

namespace Database\Seeders;

use App\Models\Admin\AdminMangdropship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminMangdropshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminMangdropship::create([
            'name'     => 'Mangdropship Admin',
            'email'    => 'mangdropship123@gmail.com',
            'password' =>  'Revaband01'
        ]);
    }
}
