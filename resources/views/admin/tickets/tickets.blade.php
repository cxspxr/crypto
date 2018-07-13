@extends('admin.layout.layout')

@section('title', 'Валюты')

@section('content')
    <div id="tickets">

        <div id="status">
            @include('partials.status')
        </div>
        @if(count($tickets))
            <p class="admin-page-desc">
                Нажмите на тикет для его прочтения и ответа
            </p>
            <table class="table has-mobile-cards">
                <thead>
                    <tr>
                        <th>Новые ответы</th>
                        <th>Валюта</th>
                        <th class="mobile--hidden">Дата продажи (Гринвич)</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr
                            @click="redirectTo('{{ route('admin.ticket', $ticket->id) }}')"
                            class="tr"
                        >
                            <td>{{ $ticket->unread_requests }}</td>
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

            {{ $paginatedTickets->links('pagination.bulma-pagination') }}
        @else
            У Вас нет тикетов.
        @endif
    </div>
@endsection

@section('scripts')

<script src="{{ asset('js/admin-tickets.js') }}"></script>

@endsection
