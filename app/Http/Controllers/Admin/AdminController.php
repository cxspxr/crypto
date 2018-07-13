<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Sell;

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

    public function sells()
    {
        $paginatedSells = Sell::with('user', 'status', 'ticker')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $sells = $paginatedSells->items();

        return view('admin.sells')->with(compact('paginatedSells', 'sells'));
    }
}
