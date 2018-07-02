<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ForbidIfTicketIsClosed
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
        if ($request->ticket->open) {
            return $next($request);
        }
        abort(403);
    }
}
