<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProviders extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\DashboardRepositoryInterface', 'App\Repository\DashboardRepository');
        $this->app->bind('App\Repository\SearchRepositoryInterface', 'App\Repository\SearchRepository');
        $this->app->bind('App\Repository\InfoRepositoryInterface', 'App\Repository\InfoRepository');
        $this->app->bind('App\Repository\CallRepositoryInterface', 'App\Repository\CallRepository');
        $this->app->bind('App\Repository\AuthRepositoryInterface', 'App\Repository\AuthRepository');
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
