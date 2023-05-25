<?php

namespace Database\Seeders;

use App\Models\paidCategoryNotice;
use App\Models\paidNoticeMangAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaidCategoryNoticeSeeder extends Seeder
{
    public function run()
    {
       paidCategoryNotice::create([
            'paid_category'      => 1,
            'paid_price'         => 100000,
            'data'               => 
                 [
                    'Dropshipers'            => "Lorem ipsum, dolor sit amet consectetur adipisicing.",
                    "afiliate_soials"        => ['Facebook', 'Shope', 'Google', 'Toko Pedia'],
                    "more_1"                 => "Lorem ipsum dolor sit amet.",
                    "more_2"                 => "Lorem ipsum dolor sit amet consectetur adipisicing."
                 ]]);
        
        paidCategoryNotice::create([
        'paid_category'      => 1,
        'paid_price'         => 100000,
        'data'               => 
                 [
                    'Dropshipers'            => "Lorem ipsum, dolor sit amet consectetur adipisicing.",
                    "afiliate_soials"        => ['Facebook', 'Shope', 'Google', 'Toko Pedia'],
                    "more_1"                 => "Lorem ipsum dolor sit amet.",
                    "more_2"                 => "Lorem ipsum dolor sit amet consectetur adipisicing."
                 ]]);

        paidCategoryNotice::create([
            'paid_category' => 2,
            'paid_price'         => 100000,
            'data'               => 
                 [
                    'Dropshipers'            => "Lorem ipsum, dolor sit amet consectetur adipisicing.",
                    "afiliate_soials"        => ['Facebook', 'Shope', 'Google', 'Toko Pedia'],
                    "more_1"                 => "Lorem ipsum dolor sit amet.",
                    "more_2"                 => "Lorem ipsum dolor sit amet consectetur adipisicing."
                 ]]);
        paidCategoryNotice::create([
            'paid_category' => 2,
            'paid_price'         => 120000,
            'data'               => 
                 [
                    'Dropshipers'            => "Lorem ipsum, dolor sit amet consectetur adipisicing.",
                    "afiliate_soials"        => ['Facebook', 'Shope', 'Google', 'Toko Pedia'],
                    "more_1"                 => "Lorem ipsum dolor sit amet.",
                    "more_2"                 => "Lorem ipsum dolor sit amet consectetur adipisicing."
                 ]]);
        paidCategoryNotice::create([
            'paid_category'      => 3,
            'paid_price'         => 2000000,
            'data'               => 
                 [
                    'Dropshipers'            => "Lorem ipsum, dolor sit amet consectetur adipisicing.",
                    "afiliate_soials"        => ['Facebook', 'Shope', 'Google', 'Toko Pedia'],
                    "more_1"                 => "Lorem ipsum dolor sit amet.",
                    "more_2"                 => "Lorem ipsum dolor sit amet consectetur adipisicing."
                 ]]);
        paidCategoryNotice::create([
            'paid_category' => 3,
            'paid_price'         => 5000000,
            'data'               => 
                 [
                    'Dropshipers'            => "Lorem ipsum, dolor sit amet consectetur adipisicing.",
                    "afiliate_soials"        => ['Facebook', 'Shope', 'Google', 'Toko Pedia'],
                    "more_1"                 => "Lorem ipsum dolor sit amet.",
                    "more_2"                 => "Lorem ipsum dolor sit amet consectetur adipisicing."
                 ]]);
    }
}
