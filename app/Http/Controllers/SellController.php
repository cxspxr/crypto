<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sell;
use App\Ticker;

class SellController extends Controller
{
    public function index()
    {
        $tickers = Ticker::all();

        return view('portal.sell')->with(compact(['tickers']));
    }

    public function sell()
    {

    }
}
