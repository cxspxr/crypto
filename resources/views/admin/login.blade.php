@extends('layout.front')

@section('content')

<div class="admin-login">
    <h1 class="page-title">Админ</h1>
    <form action="{{ route('admin.auth') }}" method="POST">
        @csrf

        {{-- <div class="field">
          <label class="label">*Логин</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input" type="text"
                placeholder="*Логин" value="{{ old('login') }}" name="login">
            <span class="icon is-small is-left">
              <i class="fa fa-user"></i>
            </span>
          </div>
        </div> --}}
        @include('partials.form-field', [
            'name' => 'login',
            'placeholder' => 'Логин',
            'fa' => 'user'
        ])
        @include('partials.form-field', [
            'name' => 'password',
            'placeholder' => 'Пароль',
            'type' => 'password',
            'fa' => 'key'
        ])

        <div class="field login-button">
            <button class="button is-primary" type="submit">
                Вход
            </button>
        </div>
    </form>
</div>

@endsection
