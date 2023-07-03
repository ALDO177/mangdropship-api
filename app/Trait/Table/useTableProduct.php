<?php

namespace App\Trait\Table{

    use App\Models\GalleriesProduct;
    use App\Models\SubCategoryProduct;
    use App\Models\VideosProduct;

    trait useTableProduct{

        public function images(){
            return $this->hasMany(
                GalleriesProduct::class, 
                'id_product', 
                'id'
            );
        }

        public function videos(){
            return $this->hasMany(
                VideosProduct::class, 
                'id_product', 
                'id'
            );
        }

        public function categorySubProduct(){
            return $this->hasOne(
                SubCategoryProduct::class, 
                'id_product', 
                'id'
            );
        }
    }
}