@extends('layout.master')

@section('navbar')
    @include('layout.portal-navbar')
@endsection

@section('foot')
    <script src="{{ asset('js/portal.js') }}"></script>

    @yield('scripts')

@endsection
