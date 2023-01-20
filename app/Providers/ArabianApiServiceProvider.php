<?php

namespace App\Providers;

use App\Services\ArabianService;
use App\Services\ArabianServiceImpl;
use Illuminate\Support\ServiceProvider;

class ArabianApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(ArabianService::class, ArabianServiceImpl::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
