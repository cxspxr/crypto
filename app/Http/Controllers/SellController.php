<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sell;
use App\Ticker;
use App\Http\Requests\SellRequest;

class SellController extends Controller
{
    public function index()
    {
        $tickers = Ticker::all();

        return view('portal.sell')->with(compact(['tickers']));
    }

    public function sell(SellRequest $request)
    {
        $sell = new Sell;
        $sell->ticker_id = $request->ticker_id;
        $sell->transaction = $request->transaction;
        $r = $sell->save();
        if (!$r) {
            return redirect()->back()->with('failure', 'Данная транзакция уже существует в системе');
        }
        return redirect()->back()->with('success', 'Заявка на продажу успешно создана');
    }
}
