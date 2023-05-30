<?php

namespace Database\Seeders;

use App\Models\MangdropshipAccessApi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MangdropshipAccessApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        MangdropshipAccessApi::create([
            'name'          => 'Mngdropshi.Id',
            'email'         => 'mangdropship@gmail.com',
            'verified_at'   => now()->format('Y-m-d H:i:s')
        ]);
    }
}
