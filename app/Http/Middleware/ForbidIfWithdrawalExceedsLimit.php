<?php

namespace App\Http\Middleware;

use Closure;
use App\Config;


class ForbidIfWithdrawalExceedsLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $withdrawal_limit = Config::first()->withdrawal_limit;
        if ($request->amount > $withdrawal_limit) {
            return redirect()->back()->withFailure('Максимальный лимит на вывод: ' . $withdrawal_limit);
        }
        
        return $next($request);
    }
}
