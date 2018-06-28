@extends('layout.front')

@section('content')
<div class="signup">
    <h1 class="title">Регистрация</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="field">
          <label class="label">*Электронная почта</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email"
                placeholder="Имейл" value="{{ old('email') }}" name="email">
            <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
            </span>
            @if($errors->has('email'))
                <span class="icon is-small is-right">
                  <i class="fa fa-exclamation-triangle"></i>
                </span>
            @endif
          </div>
          @if($errors->has('email'))
              <p class="help is-danger">Имейл уже занят.</p>
          @endif
        </div>
        <div class="field">
          <label class="label">*Пароль</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input" type="password" placeholder="Пароль" name="password">
            <span class="icon is-small is-left">
              <i class="fa fa-key"></i>
            </span>
            @if($errors->has('password'))
                <span class="icon is-small is-right">
                  <i class="fa fa-exclamation-triangle"></i>
                </span>
            @endif
          </div>
          @if($errors->has('password'))
              <p class="help is-danger">Пароли не совпадают или слишком коротки.</p>
          @endif
        </div>
        <div class="field">
          <label class="label">*Повторите пароль</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input" type="password" placeholder="Повтор пароля" name="password_confirmation">
            <span class="icon is-small is-left">
              <i class="fa fa-key"></i>
            </span>
          </div>
        </div>

        <div class="field login-button">
            <button class="button is-primary" type="submit">
                Регистрация
            </button>
        </div>
    </form>
</div>
@endsection
