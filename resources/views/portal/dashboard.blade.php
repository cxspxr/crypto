@extends('layout/portal')

@section('content')

    <div class="dashboard" id="dashboard">
        <dashboard-table :sells='@json($sells)'></dashboard-table>
    </div>

@endsection

@section('scripts')

<script src="{{ asset('js/dashboard.js') }}"></script>

@endsection
