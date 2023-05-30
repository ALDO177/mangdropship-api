<?php

namespace Database\Seeders;

use App\Models\TokensVerify;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TokensVerifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        TokensVerify::create([
            'tokens_type'      => 'quoru',
            'tokens_id'        => 1,
            'id_tokens_users'  => 1,
            'create_at'        => now()->format('Y-m-d H:i:s'),
            'expired_at'       => (new DateTime('now +1 days'))->format('Y-m-d H:i:s')
        ]);
    }
}
