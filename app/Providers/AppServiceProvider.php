<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\ObserverSubcription;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        JsonResource::withoutWrapping();
        User::observe(ObserverSubcription::class);
    }
}
