<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminUserController extends Controller
{
    public function show(User $user)
    {
        return view('admin.users.show-user')->with(compact('user'));
    }
}
