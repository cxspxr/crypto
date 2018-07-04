<?php

namespace App\Http\Middleware;

use Closure;
use App\Withdrawal;
use Auth;

class ForbidIfWithdrawalExists
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
        $existingWithdrawal = Withdrawal::where('user_id', Auth::id())
            ->whereHas('status', function ($query) {
                $query->whereNotIn('name', ['cancelled', 'complete']);    
            })->first();
        if (!$existingWithdrawal) {
            return $next($request);
        }

        return redirect()->back()->withFailure('Может быть создана только одна заявка на вывод одновременно.');
    }
}
