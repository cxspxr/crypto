@extends('admin.layout.layout')

@section('title', 'Редактирование пользователя ' . $user->email)

@section('content')

<div class="show-user">
    @include('partials.status')
    <form action="{{ route('admin.update-user', $user->id) }}" method="POST">
        @csrf

        @include('partials.form-field', [
            'name' => 'email',
            'placeholder' => 'Имейл',
            'fa' => 'envelope'
        ])
        @include('partials.form-field', [
            'name' => 'password',
            'placeholder' => 'Пароль',
            'optional' => true,
            'fa' => 'key'
        ])
        @include('partials.form-field', [
            'name' => 'balance',
            'placeholder' => 'Баланс',
            'fa' => 'dollar'
        ])

    </form>
</div>

@endsection
