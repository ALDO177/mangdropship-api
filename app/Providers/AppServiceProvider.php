<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        Builder::macro('whereLike', function($attributes, string $searchItems){
            if(is_array($attributes)){
                foreach($attributes as $attribute){
                    $this->orWhere($attribute, 'LIKE', '%' . $searchItems . '%');
                }
            }else{
                $this->orWhere($attributes, 'LIKE', '%' . $searchItems . '%');
            }
            return $this;
        });

        Builder::macro('whereLikeWithRelations', function($attributes, string $searchItems){
            $this->where(function(Builder $query) use($attributes, $searchItems){
                foreach($attributes as $attribute){
                    $query->when(str_contains($attribute, '.'), function(Builder $query) use($attribute, $searchItems){
                        [$relationName, $relationAttr] = explode('.', $attribute);
                        $query->orWhereHas($relationName, function(Builder $query) use($relationAttr, $searchItems){
                            $query->orWhere($relationAttr, 'LIKE', '%' . $searchItems . '%');
                        });
                    }, function(Builder $query) use($attribute, $searchItems){
                        $query->orWhere($attribute, 'LIKE', '%' . $searchItems . '%');
                    });
                }
            });
            return $this;
        });
        JsonResource::withoutWrapping();
    }
}
