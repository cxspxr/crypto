@extends('layout/portal')

@section('content')

<div class="tickets" id="tickets" v-cloak>
    <h1 class="title">Запросы в поддержку</h1>
    <div class="table-wrapper">
        <table class="table is-striped has-mobile-cards is-hoverable">
            <thead>
                <tr>
                    <th>Новые ответы</th>
                    <th>Последнее изменение (Гринвич)</th>
                    <th>Валюта</th>
                    <th>Дата продажи (Гринвич)</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr
                        @click="redirectToTicket('{{ route('portal.ticket', $ticket->id) }}')"
                    >
                        <td>{{ $ticket->unread_responses }}</td>
                        <td>{{ $ticket->updated_at }}</td>
                        <td>{{ $ticket->sell->ticker->name }}</td>
                        <td>{{ $ticket->sell->date }}</td>
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
    </div>
    {{ $paginatedTickets->links('pagination.bulma-pagination') }}
</div>

@endsection

@section('scripts')

<script src="{{ asset('js/tickets.js') }}"></script>

@endsection
