@extends('layout.front')

@section('content')
<div class="hero-body">
    <div class="container">
        <div class="home">
            <h1 class="title">Продавай с Cryptovault</h1>
            <div id="tickers" v-cloak>
                <table class="table is-fullwidth">
                    <thead>
                        <th></th>
                        <th>Валюта</th>
                        <th>Цена (~)</th>
                        <th class="mobile--hidden">24ч.</th>
                        <th class="mobile--hidden">Продашь</th>
                        <th class="mobile--hidden">Получишь (~)</th>
                    </thead>
                    <tbody>
                        @foreach($tickers as $ticker)
                            <tr is="ticker" :ticker="{{ $ticker }}" :ws="tickers['{{ $ticker->ticker }}']"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
    <script>
        var websocket = '{{ $websocket }}';
        var config = {!! $config !!};
    </script>
    <script src="{{ asset('js/home.js') }}"></script>

@endsection
