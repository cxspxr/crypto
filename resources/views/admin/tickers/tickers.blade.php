@extends('admin.layout.layout')

@section('title', 'Валюты')

@section('content')
    <div id="tickers">

        <div id="status">
            @include('partials.status')
        </div>
        @if(count($tickers))
            <p class="admin-page-desc">
                Нажмите на валюту для её редактирования
            </p>
            <table class="table has-mobile-cards">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th class="mobile--hidden">Аббревиатура</th>
                        <th>Кол-во продаж</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickers as $ticker)
                        <tr
                            @click="redirectTo('{{ route('admin.ticker', $ticker->id) }}')"
                            class="tr"
                        >
                            <td>{{ $ticker->name }}</td>
                            <td class="mobile--hidden">
                                {{ $ticker->pretty_ticker }}
                            </td>
                            <td>{{ $ticker->sells_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <a href="{{ route('admin.add-ticker') }}" class="button is-primary">
                Добавить валюту
            </a>
            {{ $paginatedTickers->links('pagination.bulma-pagination') }}
        @else
            У Вас нет валют.

            <a href="{{ route('admin.add-ticker') }}" class="button is-primary">
                Добавить валюту
            </a>
        @endif
    </div>
@endsection

@section('scripts')

<script src="{{ asset('js/admin-tickers.js') }}"></script>

@endsection
