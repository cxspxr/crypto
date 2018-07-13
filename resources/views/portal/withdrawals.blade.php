@extends('layout.portal')

@section('content')
<div class="withdrawals" id="withdrawals">
    <h1 class="title">
        Запросы на вывод
    </h1>
    @include('partials.status')
    <div class="table-wrapper">
        @if(count($withdrawals))
            <table class="table is-striped has-mobile-cards is-hoverable">
                <thead>
                    <tr>
                        <th>Сумма</th>
                        <th>Дата (Гринвич)</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($withdrawals as $withdrawal)
                        <tr>
                            <td>{{ $withdrawal->amount }} руб.</td>
                            <td>{{ $withdrawal->created_at }}</td>
                            <td>
                                @if($withdrawal->status->name == 'complete')
                                    <span class="tag is-primary">Выполнено</span>
                                @elseif($withdrawal->status->name == 'cancelled')
                                    <span class="tag is-danger">Отменено</span>
                                @elseif($withdrawal->status->name == 'processing')
                                    <span class="tag is-warning">Выполнение</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            У Вас нет заявок на вывод денег.
        @endif

        @if(!$user->currentWithdrawal())
            <div class="withdrawals-withdraw-button">
                <a href="{{ route('portal.new-withdrawal') }}" class="button is-primary">
                    Вывод денег
                </a>
            </div>
        @endif
    </div>

    {{ $paginatedWithdrawals->links('pagination.bulma-pagination') }}
</div>
@endsection


@section('scripts')

<script src="{{ asset('js/withdrawals.js') }}"></script>

@endsection
