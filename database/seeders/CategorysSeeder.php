<?php

namespace Database\Seeders;

use App\Models\Categorys;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Factory::create();
        $listCategory = [
            ['name'     => 'ATK',    'path'   => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/ATK.png'],
           [ 'name'     => 'Buku',   'path'   => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/Buku.png'],
            ['name'     => 'Dapur',  'path'   => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/Dapur.png'],
            ['name'     => 'Elektronik', 'path'      => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/Elektronik.png'],
            ['name'     => 'Fashion Anak', 'path'    => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/Fashion%20Anak.png'],
            ['name'     => 'Fashion Muslim', 'path'  => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/Fashion%20Muslim.png'],
            ['name'     => 'Fashion Pria', 'path'    => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/Fashion%20Pria.png'],
            ['name'     => 'Fashion Wanita', 'path'  => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/Fashion%20Wanita.png'],
            ['name'     => 'Game', 'path' => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/Game.png'],
            ['name'     => 'Handphone', 'path' => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/Handphone.png'],
            ['name'     => 'Hoby', 'path' => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/Hobi.png'],
            ['name'     => 'Ibu dan Bayi', 'path' => 'https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/mangadmin/icons/Ibu%20dan%20Bayi.png']
        ]; 
        foreach($listCategory as $values){
            Categorys::create(
                [
                    'category_name'         => $values['name'],
                    'category_description'  => $faker->text(random_int(100, 400)),
                    'image_path'            => $values['path'],
                    'active'                => true
                ]
            );
        }
    }
}
