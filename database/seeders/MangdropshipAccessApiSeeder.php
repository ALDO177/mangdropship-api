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
            'name'          => 'Mangdropship.Id',
            'email'         => 'mangdropship@gmail.com',
            'for'           => 'dropship',
            'verified_at'   => now()->format('Y-m-d H:i:s')
        ]);

        MangdropshipAccessApi::create([
            'name'          => 'Mangdropship.Mangseller',
            'email'         => 'mangdropshipSeller@gmail.com',
            'for'           => 'mangseller',
            'verified_at'   => now()->format('Y-m-d H:i:s')
        ]);

        MangdropshipAccessApi::create([
            'name'          => 'Mangdropship.Admin',
            'email'         => 'mangdropshipAdmin@gmail.com',
            'for'           => 'admins',
            'verified_at'   => now()->format('Y-m-d H:i:s')
        ]);
    }
}
