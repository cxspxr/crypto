@extends('layout/portal')

@section('content')

<div class="withdraw" id="withdraw">
    <h1 class="page-title">Вывод денег</h1>
    @include('partials.status')
    <form action="{{ route('portal.create-withdrawal') }}" method="POST">
        @csrf
        @include('partials.form-field', [
            'name' => 'amount',
            'placeholder' => 'Сумма',
            'fa' => 'dollar'
        ])

        <div class="field login-button">
            <button class="button is-primary" type="submit">
                Подать заявку
            </button>
        </div>
    </form>
</div>

@endsection

@section('scripts')

<script src="{{ asset('js/withdraw.js') }}"></script>

@endsection
