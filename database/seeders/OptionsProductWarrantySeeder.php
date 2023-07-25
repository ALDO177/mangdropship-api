<?php

namespace Database\Seeders;

use App\Models\OptionsProductWarranty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionsProductWarrantySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        OptionsProductWarranty::create([
            'name_warranty' => 'Tanpa Garansi',
            'time_to_days'  => 0,
        ]);
        OptionsProductWarranty::create([
            'name_warranty' => '1 Bulan',
            'time_to_days'  => 30,
        ]);
        OptionsProductWarranty::create([
            'name_warranty' => '3 Bulan',
            'time_to_days'  => 90,
        ]);
        OptionsProductWarranty::create([
            'name_warranty' => '6 Bulan',
            'time_to_days'  => 180,
        ]);
        OptionsProductWarranty::create([
            'name_warranty' => '1 Tahun',
            'time_to_days'  => 360,
        ]);
    }
}
