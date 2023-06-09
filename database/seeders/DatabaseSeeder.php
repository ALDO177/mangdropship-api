<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       return $this->call(
        [
          User::class,
          MangsellerSeeder::class,
          RoleSubscribtionSeeder::class,
          SubscribtionSeeder::class,
          PaidNoticeMangAccountSeeder::class,
          PaidCategoryNoticeSeeder::class,
          DiscountPaidSeeder::class,
          MangdropshipAccessApiSeeder::class
        ]);
    }
}
