<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $paginatedUsers = User::with('sells')
            ->orderBy('balance', 'desc')
            ->paginate(20);

        $users = $paginatedUsers->items();
        return view('admin.dashboard')->with(compact('users', 'paginatedUsers'));
    }
}
