<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Config;
use App\Commission;
use Blade;
use Carbon\Carbon;
use Auth;
use App\Ticket;

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

        View::composer('layout.navbar', function ($view) {
            $unread_responses = 0;
            if (Auth::check()) {
                $unread_responses = Auth::user()->tickets->pluck('unread_responses')->sum();
            }

            $view->with(compact('unread_responses'));
        });

        View::composer('admin.layout.navbar', function ($view) {
            $unread_requests = Ticket::all()->pluck('unread_requests')->sum();
            $open_tickets = Ticket::where('is_open', true)->count();

            $view->with(compact('unread_requests', 'open_tickets'));
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
