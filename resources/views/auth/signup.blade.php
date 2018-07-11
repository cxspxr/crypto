@extends('layout.front')

@section('content')
<div class="signup">
    <h1 class="title">Регистрация</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        @include('partials.form-field', [
            'name' => 'email',
            'placeholder' => 'Имейл',
            'fa' => 'envelope'
        ])

        @include('partials.form-field', [
            'name' => 'password',
            'placeholder' => 'Пароль',
            'fa' => 'key',
            'type' => 'password'
        ])

        @include('partials.form-field', [
            'name' => 'password_confirmation',
            'placeholder' => 'Повторите пароль',
            'fa' => 'key',
            'type' => 'password'
        ])

        <div class="field login-button">
            <button class="button is-primary" type="submit">
                Регистрация
            </button>
        </div>
    </form>
</div>
@endsection
