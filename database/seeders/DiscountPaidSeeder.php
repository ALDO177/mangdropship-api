<?php

namespace Database\Seeders;

use App\Models\DiscountPaid;
use DateTimeZone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountPaidSeeder extends Seeder
{
    public function run()
    {
        $now = now()->format('Y-m-d H:i:s');
        $endDate = new \DateTime('now +1 minutes', new DateTimeZone('Asia/Jakarta'));
        DiscountPaid::create([
            'paid_discount'  => 20,
            'create_at_disc' => $now,
            'expire_at_disc' => $endDate->format('Y-m-d H:i:s'),
            'offers_id'      => 1
        ]);
    }
}
