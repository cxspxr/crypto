@extends('layout.front')

@section('content')

<div id="tickers">
    @foreach($tickers as $ticker)
        <ticker :ticker="{{ $ticker }}" :ws="tickers['{{ $ticker->ticker }}']"></ticker>
    @endforeach
</div>

@endsection


@section('scripts')
    <script>
        var websocket = '{{ $websocket }}';
        var config = {!! $config !!};
    </script>
    <script src="{{ asset('js/home.js') }}"></script>

@endsection
