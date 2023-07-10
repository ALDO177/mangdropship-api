<?php

namespace Database\Seeders;

use App\Models\paidCategoryNotice;
use Illuminate\Database\Seeder;

class PaidCategoryNoticeSeeder extends Seeder
{

   public function run()
   {
      paidCategoryNotice::create([
         'paid_category'      => 1,
         'paid_price'         => 100000,
         'data'               => '
            ### Unordered
            * Item 1
            * Item 2
            * Item 2a
            * Item 2b

            ### Ordered
            
            1. Item 1
            1. Item 2
            1. Item 3
            1. Item 3a
            1. Item 3b
            '
      ]);

      paidCategoryNotice::create([
         'paid_category'      => 1,
         'paid_price'         => 100000,
         'data'               => '
         ### Unordered

         * Item 1
         * Item 2
         * Item 2a
         * Item 2b
         
         ### Ordered
         
         1. Item 1
         1. Item 2
         1. Item 3
         1. Item 3a
         1. Item 3b'
      ]);

      paidCategoryNotice::create([
         'paid_category'   => 2,
         'paid_price'      => 100000,
         'data'            => '
         ### Unordered

         * Item 1
         * Item 2
         * Item 2a
         * Item 2b
         
         ### Ordered
         
         1. Item 1
         1. Item 2
         1. Item 3
         1. Item 3a
         1. Item 3b
         '
      ]);
      paidCategoryNotice::create([
         'paid_category' => 2,
         'paid_price'    => 120000,
         'data'          => '
         ### Unordered

         * Item 1
         * Item 2
         * Item 2a
         * Item 2b
         
         ### Ordered
         
         1. Item 1
         1. Item 2
         1. Item 3
         1. Item 3a
         1. Item 3b'
      ]);
      paidCategoryNotice::create([
         'paid_category'  => 3,
         'paid_price'     => 2000000,
         'data'           => '
         ### Unordered
         * Item 1
         * Item 2
         * Item 2a
         * Item 2b

         ### Ordered

         1. Item 1
         1. Item 2
         1. Item 3
         1. Item 3a
         1. Item 3b'
      ]);
      paidCategoryNotice::create([
         'paid_category'  => 3,
         'paid_price'     => 5000000,
         'data'           => '
            ### Unordered
            * Item 1
            * Item 2
            * Item 2a
            * Item 2b
            
            ### Ordered
            
            1. Item 1
            1. Item 2
            1. Item 3
            1. Item 3a
            1. Item 3b
            '
      ]);
   }
}
