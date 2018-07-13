<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Config;
use App\Http\Requests\UpdateConfigRequest;

class AdminConfigController extends Controller
{
    public function index()
    {
        $config = Config::first();
        return view('admin.config.config')->with(compact('config'));
    }

    public function update(UpdateConfigRequest $request)
    {
        $config = Config::first();

        $config->sell_lifetime = $request->sell_lifetime;
        $config->withdrawal_limit = $request->withdrawal_limit;
        $config->currency_rate = $request->currency_rate;

        $config->save();

        return redirect()->back()->withSuccess('Информация успешно сохранена!');
    }

}
