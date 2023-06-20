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
            AdminMangdropshipSeeder::class,
            MangsellerSeeder::class,
            RoleSubscribtionSeeder::class,
            SubscribtionSeeder::class,
            PaidNoticeMangAccountSeeder::class,
            PaidCategoryNoticeSeeder::class,
            DiscountPaidSeeder::class,
            MangdropshipAccessApiSeeder::class,
            CategorysSeeder::class,
            SubCategorysSeeder::class,
            ProdukSeeder::class,
            StoreSeeder::class,
            SupllierSeeder::class,
            ProductCategorysSeeder::class,
            GalleriesProductSeeder::class,
            SuplierProduksSeeder::class,
            StoreStatusSeeder::class,
            StoreAccountSeeder::class,
            AccountBankSeeder::class,
            StoreShipingExpeditionSeeder::class,
            StoreInformationSeeder::class,
            SuplierAccountBankSeeder::class,
        ]);
    }
}
