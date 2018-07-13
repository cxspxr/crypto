<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Http\Requests\CreateAnswerRequest;
use App\Http\Requests\UploadImageRequest;
use Auth;
use App\Answer;

class AdminTicketController extends Controller
{
    public function index()
    {
        $paginatedTickets = Ticket::withCount(['answers' => function ($query) {
                $query->where('is_response', false)->where('read', false);
            }])
            ->orderBy('is_open', 'desc')
            ->orderBy('answers_count', 'desc')
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        $tickets = $paginatedTickets->items();

        return view('admin.tickets.tickets')
            ->with(compact('paginatedTickets', 'tickets'));
    }

    public function show(Ticket $ticket)
    {
        $ticket->readRequests();
        return view('admin.tickets.ticket')->with(compact('ticket'));
    }

    public function createAnswer(CreateAnswerRequest $request, Ticket $ticket)
    {
        $answer = new Answer;
        $answer->content = $request->content;
        $answer->ticket_id = $ticket->id;
        $answer->is_response = true;
        $answer->save();

        return redirect()->back()->with('success', 'Вы успешно отправили ответ!');
    }
}
