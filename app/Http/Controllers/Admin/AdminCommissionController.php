<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Commission;
use App\Http\Requests\UpdateOrCreateCommissionRequest;

class AdminCommissionController extends Controller
{
    public function index()
    {
        $paginatedCommissions = Commission::orderBy('from', 'asc')
            ->paginate(10);

        $commissions = $paginatedCommissions->items();

        return view('admin.commissions.commissions')
            ->with(compact('paginatedCommissions', 'commissions'));
    }

    public function show(Commission $current_commission)
    {
        return view('admin.commissions.commission')->with(compact('current_commission'));
    }

    public function update(UpdateOrCreateCommissionRequest $request, Commission $current_commission)
    {
        $current_commission->from = $request->from;
        $current_commission->commission = $request->commission * 0.01;
        $current_commission->save();

        return redirect()->back()->withSuccess('Информация успешно сохранена');
    }

    public function add()
    {
        return view('admin.commissions.commission');
    }

    public function create(UpdateOrCreateCommissionRequest $request)
    {
        $commission = new Commission;
        $commission->from = $request->from;
        $commission->commission = $request->commission * 0.01;
        $commission->save();

        return redirect()->route('admin.commissions')->withSuccess('Комиссия успешно добавлена');
    }

    public function remove(Commission $commission)
    {
        if ($commission->from != 0) {
            $commission->delete();
            return redirect()->route('admin.commissions')->withFailure('Комиссия успешно удалена');
        }

        return redirect()->route('admin.commissions')->withFailure('Эта комиссия не может быть удалена, так как она является основной.');
    }
}
