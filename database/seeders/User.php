<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsUser::create([
            'name'     => 'Aldo Ratmawan',
            'email'    => 'aldo.ratmawan9999@gmail.com',
            'password' =>  'aldo12345'
        ]);
        
        ModelsUser::create([
            'name'     => 'Otong',
            'email'    => 'otong@gmail.com',
            'password' =>  'aldo12345'
        ]);
    }
}
