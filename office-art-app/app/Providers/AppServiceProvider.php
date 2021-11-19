<?php

namespace App\Providers;

use App\Service\MetMuseumAPIService;
use App\Service\MetMuseumAPIServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(MetMuseumAPIService::class, MetMuseumAPIServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }
}
