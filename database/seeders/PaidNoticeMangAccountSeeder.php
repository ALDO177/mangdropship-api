<?php

namespace Database\Seeders;

use App\Models\OfferAccount;
use App\Models\paidNoticeMangAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaidNoticeMangAccountSeeder extends Seeder
{
    public function run()
    {
        $array = ['ECONOMIAL', 'PREMIUM', 'PRO'];

        foreach($array as $data){
            paidNoticeMangAccount::create([
                'paid_category_type' =>  $data,
            ]);
        }
    }
}
