<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Ticket;

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
}
