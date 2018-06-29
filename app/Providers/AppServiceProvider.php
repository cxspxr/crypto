<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Config;
use App\Commission;
use Blade;
use Auth;

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
            $commission = Commission::whereFrom(0.0)->first()->commission;
            $user = Auth::user();

            $view->with(compact('config', 'commission', 'user'));
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
