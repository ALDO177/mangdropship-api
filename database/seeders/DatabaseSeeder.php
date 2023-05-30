<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DiscountPaid;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       return $this->call(
        [
          User::class,
          RoleSubscribtionSeeder::class,
          SubscribtionSeeder::class,
          PaidNoticeMangAccountSeeder::class,
          PaidCategoryNoticeSeeder::class,
          DiscountPaidSeeder::class,
          MangdropshipAccessApiSeeder::class
        ]);
    }
}
