<?php

namespace Database\Seeders;

use App\Models\Categorys;
use App\Models\SubCategorys;
use App\Models\TagsCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TagsCategorySeeder extends Seeder
{
    public function run()
    {
        // TagsCategory::factory()->count(5)->create();
        $faker = Factory::create();
        $categorys   = Categorys::all();
        
        $categorys->map(function($dataCategory) use($faker){
            TagsCategory::create([
                'tags_category_type' => Categorys::class,
                'tags_category_id'   => $dataCategory->id,
                'publish'            => $faker->boolean(),
            ]);
            
            TagsCategory::create([
                'tags_category_type' => SubCategorys::class,
                'tags_category_id'   => $dataCategory->id,
                'publish'            => $faker->boolean(),
            ]);
        });

    }
}
