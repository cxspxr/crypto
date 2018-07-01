<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Ticket;
use App\Http\Requests\UploadImageRequest;
use Storage;

class TicketsController extends Controller
{
    public function index()
    {
        $paginatedTickets = Auth::user()
            ->tickets()
            ->with('answers', 'sell', 'sell.ticker')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $tickets = $paginatedTickets->items();

        return view('portal.tickets')->with(compact(['tickets', 'paginatedTickets']));
    }

    public function show(Ticket $ticket)
    {
        $ticket->readResponses();
        return view('portal.ticket')->with(compact(['ticket']));
    }

    public function uploadImage(UploadImageRequest $request)
    {
        $s = $request->file('image')->store('public');

        return Storage::url($s);
    }
}
