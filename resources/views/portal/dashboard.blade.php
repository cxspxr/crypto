@extends('layout/portal')

@section('content')

    <div class="dashboard" id="dashboard" v-cloak>
        <h1 class="page-title">История продаж</h1>
        <dashboard-table :sells='@json($sells)' :rate="{{ $rate }}"></dashboard-table>
        <p class="dashboard-desc">
            *За каждую продажу Вам начисляются деньги в долларах, поэтому если меняется
            курс рубля по отношению к доллару - меняется и количество вырученных денег
            в большую или меньшую сторону соответственно. То же самое касается и общего баланса.
        </p>
    </div>

@endsection

@section('scripts')

<script src="{{ asset('js/dashboard.js') }}"></script>

@endsection
