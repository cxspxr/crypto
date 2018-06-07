@extends('layout.front')

@section('content')

<div id="tickers">
    <ticker pair="tBTCUSD"></ticker>
</div>

@endsection


@section('scripts')

    <script src="{{ asset('js/home.js') }}"></script>

@endsection
