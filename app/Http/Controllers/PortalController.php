<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PortalController extends Controller
{
    public function index()
    {
        $sells = Auth::user()->sells()->with('status', 'ticker')->get();
        return view('portal.dashboard')->with(compact('sells'));
    }
}
