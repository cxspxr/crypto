<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use Auth;

class PortalController extends Controller
{
    public function index()
    {
        $sells = Auth::user()->sells()->with('status', 'ticker')->get();
        $rate = Config::first()->currency_rate;
        return view('portal.dashboard')->with(compact('sells', 'rate'));
    }
}
