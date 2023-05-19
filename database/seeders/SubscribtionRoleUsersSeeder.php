<?php

namespace Database\Seeders;

use App\Models\SubscribtionRoleUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscribtionRoleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscribtionRoleUsers::create([
            'status'     => true,
            'subscribe'  => 'AF',
            'create_at'  => now('Asia/Jakarta')->format('Y-m-d H:i:s'),
            'expired_at' => now('Asia/Jakarta')->format('Y-m-d H:i:s')
        ]);
    }
}
