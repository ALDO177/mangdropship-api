<?php

namespace App\Providers;

use App\Models\MangSellerModels\MangSellers;
use App\Policies\SuplierPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        MangSellers::class => SuplierPolicy::class
    ];

    public function boot()
    {
        $this->registerPolicies();
        Gate::define('suplier-access', [SuplierPolicy::class, 'view']);
    }
}
