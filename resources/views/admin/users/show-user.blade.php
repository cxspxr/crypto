@extends('admin.layout.layout')

@section('title', 'Редактирование пользователя ' . $current_user->email)

@section('content')

<div class="show-user">
    <div id="status">
        @include('partials.status')
    </div>
    <form action="{{ route('admin.update-user', $current_user->id) }}" method="POST">
        @csrf

        @include('partials.form-field', [
            'name' => 'email',
            'placeholder' => 'Имейл',
            'fa' => 'envelope',
            'value' => $current_user->email
        ])
        @include('partials.form-field', [
            'name' => 'balance',
            'placeholder' => 'Баланс (руб.)',
            'fa' => 'dollar',
            'value' => $current_user->balance
        ])
        @include('partials.form-field', [
            'name' => 'commission',
            'placeholder' => 'Индивидуальная комиссия (%)',
            'fa' => 'percent',
            'optional' => true,
            'value' => $current_user->commission
        ])
        @include('partials.form-field', [
            'name' => 'password',
            'placeholder' => 'Пароль',
            'optional' => true,
            'fa' => 'key'
        ])

        <button type="submit" class="submit-button button is-primary">Сохранить изменения</button>
    </form>
</div>

@endsection
