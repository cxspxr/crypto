@extends('layout.front')

@section('content')

<div id="tickers">
    <ticker pair="tBTCUSD"></ticker>
</div>

@endsection


@section('scripts')
    <script>
        window.WebSocket = window.WebSocket || window.MozWebSocket;

        var connection = new WebSocket('{{ $websocket }}');
    </script>
    <script src="{{ asset('js/home.js') }}"></script>

@endsection
