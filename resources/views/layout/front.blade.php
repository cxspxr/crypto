@extends('layout.master')

@section('navbar')
    @include('layout.front-navbar')
@endsection

@section('foot')

    <script src="{{ asset('js/front.js') }}"></script>

    @yield('scripts')

@endsection
