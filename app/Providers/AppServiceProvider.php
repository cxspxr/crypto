<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $config = Config::first();

            $view->with(compact('config'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
