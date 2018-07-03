<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ForbidIfSellTicketIsOpen
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
        if (!Auth::user()->tickets()->where('is_open', true)->where('sell_id', $request->sell->id)->first()) {
            return $next($request);
        }

        abort(403);
    }
}
