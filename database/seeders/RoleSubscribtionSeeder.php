<?php

namespace Database\Seeders;

use App\Models\RoleSubscribtion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSubscribtionSeeder extends Seeder
{
    
    public function run()
    {
        RoleSubscribtion::create([
            'role_type' => 'AF',
            'status_payment' => false,
        ]);

        RoleSubscribtion::create([
            'role_type' => 'MG',
            'status_payment' => true
        ]);
    }
}
