<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ForbidIfWithdrawalExceedsUserBalance
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
        if (Auth::user()->balance >= $request->amount) {
            return $next($request);
        }

        return redirect()->back()->withFailure('У Вас недостаточно денег на балансе.');
    }
}
