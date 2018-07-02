<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Ticket;
use App\Answer;
use App\Http\Requests\CreateAnswerRequest;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('forbid-if-not-ticket-owner')->only('createAnswer', 'show');
        $this->middleware('forbid-if-ticket-is-closed')->only('createAnswer');
    }

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

    public function createAnswer(Ticket $ticket, CreateAnswerRequest $request)
    {
        $answer = new Answer;
        $answer->content = $request->content;
        $answer->ticket_id = $ticket->id;
        $answer->save();

        return redirect()->back()->with('success', 'Спасибо за Ваш запрос!');
    }
}
