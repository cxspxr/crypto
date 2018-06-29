<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use Auth;

class PortalController extends Controller
{
    public function index()
    {
        $paginatedSells = Auth::user()
            ->sells()
            ->with('status', 'ticker')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $sells = $paginatedSells->items();
        $rate = Config::first()->currency_rate;
        return view('portal.dashboard')->with(compact('paginatedSells', 'sells' ,'rate'));
    }
}
