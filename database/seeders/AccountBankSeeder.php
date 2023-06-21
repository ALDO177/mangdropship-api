<?php

namespace Database\Seeders;

use App\Models\AccountBank;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AccountBankSeeder extends Seeder
{

    public function run()
    {
        
        $faker = Factory::create();
        foreach(['BNI', 'BRI', 'BCA', 'MANDIRI', 'BTN', 'BSI'] as $key){
            AccountBank::create([
                'type_bank' => $key,
                'thumbnail' => $faker->imageUrl(500, 500, 'random' , true, $faker->text(50)),
            ]);
        }
    }
}
