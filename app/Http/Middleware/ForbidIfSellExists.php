<?php

namespace App\Http\Middleware;

use Closure;
use App\Sell;

class ForbidIfSellExists
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
        $existingSell = Sell::whereTransaction($request->transaction)
            ->where('ticker_id', $request->ticker_id)
            ->whereHas('status', function($query) {
                $query->whereNotIn('name', ['executed', 'cancelled']);
            })
            ->first();

        if (!$existingSell) {
            return $next($request);
        }

        return redirect()->back()->withFailure('Заявка на эту транзакцию уже открыта');
    }
}
