<?php

namespace App\Trait\Builder{

    use Illuminate\Database\Eloquent\Builder;

    trait useBuilderAdditional{

        public function likeWithRelations(array $attributes, array $relations = [], string $searchItem) : Builder{
            $query = $this->query();
            if($query instanceof Builder){
                $query->with($relations)->where(function(Builder $query) use($attributes, $searchItem){
                    if(is_array($attributes)){
                         foreach($attributes as $attributte){
                            $query->when(str_contains($attributte, '.'), function(Builder $query) use($attributte, $searchItem){
                                [$relationName, $relationAttr] = explode('.', $attributte);
                                $query->orWhereHas($relationName, function(Builder $query) use($relationAttr, $searchItem){
                                    $query->where($relationAttr, 'LIKE', '%' . $searchItem . '%');
                                });
                            }, function(Builder $query) use($attributte, $searchItem){
                                $query->orWhere($attributte, 'LIKE','%' .$searchItem . '%');
                            });
                        }
                    }
                });
            }
            return $query;
        }
    }
}