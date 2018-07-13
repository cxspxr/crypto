@extends('admin.layout.layout')

@section('title', 'Продажи')

@section('content')
    <div id="sells">

        @if(count($sells))
            <table class="table has-mobile-cards">
                <thead>
                    <tr>
                        <th>Сумма</th>
                        <th>Статус</th>
                        <th class="mobile--hidden">Пользователь</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sells as $sell)
                        <tr
                        >
                            <td>{{ $sell->volume ?: '?' }} {{ $sell->ticker->pretty_ticker }}</td>
                            <td>
                                @if($sell->status->name == 'complete')
                                    <span class="tag is-primary">Выполнено</span>
                                @elseif($sell->status->name == 'cancelled')
                                    <span class="tag is-danger">Отменено</span>
                                @elseif($sell->status->name == 'waiting')
                                    <span class="tag is-default">Ожидание</span>
                                @elseif($sell->status->name == 'processing')
                                    <span class="tag is-warning">Выполнение</span>
                                @endif
                            </td>
                            <td class="mobile--hidden">{{ $sell->user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $paginatedSells->links('pagination.bulma-pagination') }}
        @else
            У Вас нет продаж.
        @endif
    </div>
@endsection
