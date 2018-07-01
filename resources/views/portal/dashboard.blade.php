@extends('layout/portal')

@section('content')

    <div class="dashboard">
        <h1 class="page-title">История продаж</h1>
        <div class="table-wrapper">
            <table class="table is-striped has-mobile-cards is-hoverable">
                <thead>
                    <tr>
                        <th>Валюта</th>
                        <th>Отправлено</th>
                        <th>Получено (руб.)</th>
                        <th>Дата (Гринвич)</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sells as $sell)
                        <tr>
                            <td>{{ $sell->ticker->name }}</td>
                            <td>{{ $sell->volume }}</td>
                            <td>{{ $sell->income }}</td>
                            <td>{{ $sell->date }}</td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $paginatedSells->links('pagination.bulma-pagination') }}
        <p class="dashboard-desc">
            *За каждую продажу Вам начисляются деньги в долларах, поэтому если меняется
            курс рубля по отношению к доллару - меняется и количество вырученных денег
            в большую или меньшую сторону соответственно. То же самое касается и общего баланса.
        </p>
    </div>

@endsection

@section('scripts')

<script src="{{ asset('js/dashboard.js') }}"></script>

@endsection
