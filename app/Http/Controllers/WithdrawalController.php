<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Withdrawal;
use App\Http\Requests\CreateWithdrawalRequest;
use Auth;

class WithdrawalController extends Controller
{
    public function __construct()
    {
        $this->middleware('forbid-if-withdrawal-exists')->only('createWithdrawal');
        $this->middleware('forbid-if-withdrawal-exceeds-limit')->only('createWithdrawal');
        $this->middleware('forbid-if-withdrawal-exceeds-user-balance')->only('createWithdrawal');
    }

    public function index()
    {
        $paginatedWithdrawals = Auth::user()->withdrawals()->paginate(5);

        $withdrawals = $paginatedWithdrawals->items();

        return view('portal.withdrawals')->with(compact(['withdrawals', 'paginatedWithdrawals']));
    }

    public function newWithdrawal()
    {
        return view('portal.new-withdrawal');
    }

    public function createWithdrawal(CreateWithdrawalRequest $request)
    {
        Withdrawal::create($request->only('amount', 'card'));

        return redirect()->route('portal.withdrawals')->withSuccess('Заявка на вывод успешно создана');
    }
}
