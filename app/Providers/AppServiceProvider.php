<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Config;
use Blade;

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

        $this->registerBladeDirectives();
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

    public function registerBladeDirectives()
    {
        Blade::directive('isRoute', function ($name) {
            return "<?php echo Route::is($name) ? 'is-active' : '';?>";
        });
    }
}
