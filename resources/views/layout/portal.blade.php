@extends('layout.master')

@section('navbar')
    @include('layout.navbar')
@endsection

@section('body')

<div class="container">
    @yield('content')
</div>

@endsection

@section('foot')
    <script src="{{ asset('js/portal.js') }}"></script>

    @yield('scripts')

@endsection
