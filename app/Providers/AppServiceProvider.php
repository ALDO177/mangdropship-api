<?php

namespace App\Providers;

use App\Jobs\JobOberverProduk;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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
        JsonResource::withoutWrapping();
    }
}
