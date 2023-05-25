<?php

namespace App\Trait\Table{

    use App\Models\paidCategoryNotice;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Str;

    trait useTablePaidAccount{

        protected static function booting(){
            static::creating(function(Model $model){
                $model->id_use_paid = Str::upper(Str::random(20));
            });
        }

        public function paidSelect(){
            return $this->hasMany(paidCategoryNotice::class, 'paid_category', 'id');
        }

        public static function findWithCategory(int $id){
            return static::with(['paidSelect' => ['discount']])->where('id', $id)->first();
        }
    }
}