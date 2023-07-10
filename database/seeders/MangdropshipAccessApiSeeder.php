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
            'verified_at'   => now()->format('Y-m-d H:i:s'),
            'access_tokens' => 'd8cfa0a5ce58914b7407d1319da89257'
        ]);

        MangdropshipAccessApi::create([
            'name'          => 'Mangdropship.Mangseller',
            'email'         => 'mangdropshipSeller@gmail.com',
            'for'           => 'mangseller',
            'verified_at'   => now()->format('Y-m-d H:i:s'),
            'access_tokens' => 'c8969d01f7da109939c6d49b32b60996'
        ]);

        MangdropshipAccessApi::create([
            'name'          => 'Mangdropship.Admin',
            'email'         => 'mangdropshipAdmin@gmail.com',
            'for'           => 'admins',
            'verified_at'   => now()->format('Y-m-d H:i:s'),
            'access_tokens' => '216c5fad7bc0e3051688ac913740141e'
        ]);
    }
}
