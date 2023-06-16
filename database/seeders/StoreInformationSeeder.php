<?php

namespace Database\Seeders;

use App\Models\MangSellerModels\Store;
use App\Models\MangSellerModels\StoreAccount;
use App\Models\MangSellerModels\StoreInformation;
use App\Models\MangSellerModels\StorePaymentBank;
use App\Models\MangSellerModels\StoreShipingExpedition;
use App\Models\MangSellerModels\StoreStatus;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $fakers = Factory::create();
        StoreInformation::create([
            'id_store'  => Store::all()[0]['id'],
            'id_status' => $fakers->randomElement(StoreStatus::all())['id'],
            'id_store_account' => $fakers->randomElement(StoreAccount::all())['id'],
            'id_store_payment' => $fakers->randomElement(StorePaymentBank::all())['id'],
            'id_store_expedition' => $fakers->randomElement(StoreShipingExpedition::all())['id']
        ]);
        
        StoreInformation::create([
            'id_store'  => Store::all()[1]['id'],
            'id_status' => $fakers->randomElement(StoreStatus::all())['id'],
            'id_store_account' => $fakers->randomElement(StoreAccount::all())['id'],
            'id_store_payment' => $fakers->randomElement(StorePaymentBank::all())['id'],
            'id_store_expedition' => $fakers->randomElement(StoreShipingExpedition::all())['id']
        ]);
    }
}
