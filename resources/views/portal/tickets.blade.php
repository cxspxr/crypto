@extends('layout/portal')

@section('content')

<div class="tickets" id="tickets" v-cloak>
    <h1 class="title">
        Запросы в поддержку
    </h1>
    <div class="table-wrapper">
        @if(count($tickets))
            <table class="table is-striped has-mobile-cards is-hoverable">
                <thead>
                    <tr>
                        <th>Новые ответы</th>
                        <th class="mobile--hidden">Последнее изменение (Гринвич)</th>
                        <th>Валюта</th>
                        <th class="mobile--hidden">Дата продажи (Гринвич)</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr
                            @click="redirectToTicket('{{ route('portal.ticket', $ticket->id) }}')"
                            class="tickets-row"
                        >
                            <td>{{ $ticket->unread_responses }}</td>
                            <td class="mobile--hidden">{{ $ticket->answers()->latest()->first() ? $ticket->answers()->latest()->first()->created_at : $ticket->created_at }}</td>
                            <td>{{ $ticket->sell ? $ticket->sell->ticker->name : '-' }}</td>
                            <td class="mobile--hidden">{{ $ticket->sell ? $ticket->sell->date : '-' }}</td>
                            <td>
                                <span class="tag is-{{ $ticket->is_open ? 'primary' : 'danger' }}">
                                    @if($ticket->is_open)
                                        Открыт
                                    @else
                                        Закрыт
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            У Вас нет никаких запросов в поддержку.
        @endif
    </div>

    @if(!$common_ticket)
        <a href="{{ route('portal.new-ticket') }}" class="button is-primary">
            Общий запрос
        </a>
    @endif

    {{ $paginatedTickets->links('pagination.bulma-pagination') }}
</div>

@endsection

@section('scripts')

<script src="{{ asset('js/tickets.js') }}"></script>

@endsection
