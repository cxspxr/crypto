@extends('admin.layout.layout')

@section('title', 'Выводы')

@section('content')
    <div id="withdrawals">

        <div id="status">
            @include('partials.status')
        </div>
        @if(count($withdrawals))
            <p class="admin-page-desc">
                Нажмите на вывод для изменения его статуса
            </p>
            <table class="table has-mobile-cards">
                <thead>
                    <tr>
                        <th>Сумма</th>
                        <th class="mobile--hidden">Карта</th>
                        <th class="mobile--hidden">Пользователь</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($withdrawals as $withdrawal)
                        <tr
                            @click="redirectTo('{{ route('admin.withdrawal', $withdrawal->id) }}')"
                            class="tr"
                        >
                            <td>{{ $withdrawal->amount }}</td>
                            <td class="mobile--hidden">{{ $withdrawal->card }}</td>
                            <td class="mobile--hidden">{{ $withdrawal->user->email }}</td>
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

            {{ $paginatedWithdrawals->links('pagination.bulma-pagination') }}
        @else
            У Вас нет выводов.
        @endif
    </div>
@endsection

@section('scripts')

<script src="{{ asset('js/admin-withdrawals.js') }}"></script>

@endsection
