<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticker;
use App\Config;

class HomeController extends Controller
{
    public function index()
    {
        $websocket = 'ws://' . env('WEBSOCKET_HOST') . ':' . env('WEBSOCKET_PORT') . '/';
        $tickers = Ticker::all();

        return view('home')->with(compact('websocket', 'tickers'));
    }
}
