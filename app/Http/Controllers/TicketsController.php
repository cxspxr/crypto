<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Ticket;
use App\Answer;
use App\Sell;
use App\Http\Requests\CreateAnswerRequest;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('forbid-if-not-ticket-owner')->only('createAnswer', 'show');
        $this->middleware('forbid-if-ticket-is-closed')->only('createAnswer');
        $this->middleware('forbid-if-not-sell-owner')->only('createForSell');
        $this->middleware('forbid-if-sell-ticket-is-open')->only('createForSell');
        $this->middleware('forbid-if-ticket-is-open')->only('create');
    }

    public function index()
    {
        $paginatedTickets = Auth::user()
            ->tickets()
            ->with('answers', 'sell', 'sell.ticker')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $common_ticket = Auth::user()
            ->tickets()
            ->where('is_open', true)
            ->where('sell_id' , null)
            ->first();

        $tickets = $paginatedTickets->items();

        return view('portal.tickets')
            ->with(compact(['tickets', 'paginatedTickets', 'common_ticket']));
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
        $ticket->user()->associate(Auth::user());
        $answer->save();

        return redirect()->back()->with('success', 'Спасибо за Ваш запрос!');
    }

    public function create(CreateAnswerRequest $request)
    {
        $ticket = new Ticket;
        $ticket->content = $request->content;
        $ticket->user()->associate(Auth::user());
        $ticket->save();

        return redirect()
            ->route('portal.ticket', $ticket)
            ->withSuccess('Спасибо за Ваш запрос!')
            ->with(compact(['ticket']));
    }

    public function createForSell(Sell $sell, CreateAnswerRequest $request)
    {
        $ticket = new Ticket;
        $ticket->content = $request->content;
        $ticket->sell()->associate($sell);
        $ticket->user()->associate(Auth::user());
        $ticket->save();

        return redirect()
            ->route('portal.ticket', $ticket)
            ->withSuccess('Спасибо за Ваш запрос!')
            ->with(compact(['ticket']));
    }

    public function newTicketForSell(Sell $sell)
    {
        return view('portal.new-ticket')->with(compact(['sell']));
    }
}
