<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Withdrawal;
use App\Status;
use App\Http\Requests\UpdateWithdrawalRequest;

class AdminWithdrawController extends Controller
{
    public function index()
    {
        $paginatedWithdrawals = Withdrawal::withCount(['status' => function ($query) {
                $query->whereName('processing');
            }])
            ->with('status')
            ->orderBy('status_count', 'desc')
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        $withdrawals = $paginatedWithdrawals->items();

        return view('admin.withdrawals.withdrawals')
            ->with(compact('paginatedWithdrawals', 'withdrawals'));
    }

    public function show(Withdrawal $withdrawal)
    {
        $cancelled_status = Status::where('name', 'cancelled')->first()->id;
        $complete_status = Status::where('name', 'complete')->first()->id;
        $processing_status = Status::where('name', 'processing')->first()->id;

        return view('admin.withdrawals.withdrawal')
            ->with(compact('withdrawal', 'cancelled_status', 'complete_status', 'processing_status'));
    }

    public function changeStatus(UpdateWithdrawalRequest $request, Withdrawal $withdrawal)
    {
        $withdrawal->status_id = $request->status_id;
        $withdrawal->amount = $request->amount;
        $withdrawal->save();
        return redirect()->back()->with('success', 'Вы успешно изменили статус заявки на вывод!');
    }
}
