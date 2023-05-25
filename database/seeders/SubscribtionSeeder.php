<?php

namespace Database\Seeders;

use App\Models\Subscribtion;
use Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscribtionSeeder extends Seeder
{
    public function run()
    {
       Subscribtion::create([
        'subscription_role_id' => 1,
        'id_role_subs' => 1,
       ]);
       
       Subscribtion::create([
          'subscription_role_id' => 1,
          'id_role_subs'         => 2,
       ]);
    }
}
