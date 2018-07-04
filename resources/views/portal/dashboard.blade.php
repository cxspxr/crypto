@extends('layout/portal')

@section('content')

    <div class="dashboard">
        <h1 class="page-title">История продаж</h1>
        <div class="table-wrapper">
            @if(count($sells))
                <table class="table is-striped has-mobile-cards is-hoverable">
                    <thead>
                        <tr>
                            <th>Валюта</th>
                            <th class="mobile--hidden">Отправлено</th>
                            <th class="mobile--hidden">Получено (руб.)</th>
                            <th class="mobile--hidden">Дата (Гринвич)</th>
                            <th>Статус</th>
                            <th>Поддержка</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sells as $sell)
                            <tr>
                                <td>{{ $sell->ticker->name }}</td>
                                <td class="mobile--hidden">{{ $sell->pretty_volume }}</td>
                                <td class="mobile--hidden">{{ $sell->pretty_income }}</td>
                                <td class="mobile--hidden">{{ $sell->date }}</td>
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
                                <td>
                                    @if(!$sell->currentTicket())
                                        <a class="tag is-primary" href="{{ route('portal.create-ticket-for-sell', $sell->id) }}">
                                            Создать
                                        </a>
                                    @else
                                        <a class="tag is-success"
                                            href={{ route('portal.ticket', $sell->currentTicket()->id) }}
                                        >
                                            Просмотр
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $paginatedSells->links('pagination.bulma-pagination') }}
                <p class="dashboard-desc">
                    *За каждую продажу Вам начисляются деньги в долларах, поэтому если меняется
                    курс рубля по отношению к доллару - меняется и количество вырученных денег
                    в большую или меньшую сторону соответственно. То же самое касается и общего баланса.
                </p>
            @else
                <div class="dashboard-empty">
                    У вас нет никаких продаж.
                </div>
            @endif
            <div class="dashboard-sell-button">
                <a href="{{ route('portal.sell') }}" class="button is-primary">
                    Продажа
                </a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script src="{{ asset('js/dashboard.js') }}"></script>

@endsection
