@extends('layout.front')

@section('content')
<section class="container">
    <div id="tickers" v-cloak>
        <table class="table is-striped is-hoverable is-fullwidth">
            <thead>
                <th></th>
                <th>Валюта</th>
                <th>Цена</th>
                <th>24ч. изменение</th>
                <th class="mobile--hidden">Продашь</th>
                <th class="mobile--hidden">Получишь</th>
            </thead>
            <tbody>
                @foreach($tickers as $ticker)
                    <tr is="ticker" :ticker="{{ $ticker }}" :ws="tickers['{{ $ticker->ticker }}']"></tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
@endsection


@section('scripts')
    <script>
        var websocket = '{{ $websocket }}';
        var config = {!! $config !!};
    </script>
    <script src="{{ asset('js/home.js') }}"></script>

@endsection
