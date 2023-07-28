<?php

namespace Database\Seeders;

use App\Models\BadgesUmkm;
use Illuminate\Database\Seeder;

class BadgesUmkmSeeder extends Seeder
{
    public function run()
    {
        BadgesUmkm::create([
            'id_suplier'  => '01d8b2bd-2e84-4eda-b6be-e75d43181254',
            'badges_id'   => 1,
            'badges_type' => 'App\Models\MangSellerModels\ListBrandProduk'
        ]); 
        
        BadgesUmkm::create([
            'id_suplier'  => '01d8b2bd-2e84-4eda-b6be-e75d43181254',
            'badges_id'   => 1,
            'badges_type' => 'App\Models\Admin\ListMerkProdukSeller'
        ]); 
    }
}
