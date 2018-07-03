<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ForbidIfTicketIsOpen
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
        if (!Auth::user()->tickets()->where('is_open', true)->where('sell_id', null)->first()) {
            return $next($request);
        }

        abort(403);
    }
}
