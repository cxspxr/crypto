<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt([
            'login' => $request->login,
            'password' => $request->password
        ], true)
        ) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('login'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
