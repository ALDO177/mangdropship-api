<?php

namespace App\Trait\Table{

    use App\Models\paidCategoryNotice;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Http\Request;
    use Illuminate\Support\Arr;
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
        
        public static function getListPaid(Request $request){
            if(Arr::exists($request->all(), 'sort')  && Arr::exists($request->all(),  'limit')) return static::typeSorting($request);
            if(Arr::exists($request->all(), 'sort')  && !Arr::exists($request->all(), 'limit')) return static::typeSorting($request);
            if(!Arr::exists($request->all(), 'sort') && Arr::exists($request->all(),  'limit')) return static::typeSorting($request);
        }

        protected static function typeSorting(Request $request){
            switch($request->sort){
                case 'desc':
                    return static::with(['paidSelect' => ['discount']])
                    ->chunkMap(function($values){
                        return $values;
                    })->sortDesc()->splice(0, intval($request->limit));
                default:
                    return static::with(['paidSelect' => ['discount']])
                    ->chunkMap(function($values){
                        return $values;
                    })->splice(0, intval($request->limit));
            }
        }
    }
}