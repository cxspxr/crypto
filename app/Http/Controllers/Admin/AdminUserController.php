<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UpdateUserRequest;
use Hash;

class AdminUserController extends Controller
{
    public function show(User $user)
    {
        return view('admin.users.show-user')->with(compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->commission = $request->commission;
        $user->balance = $request->balance;

        return redirect()->route('admin.users.show-user', $user);
    }
}
