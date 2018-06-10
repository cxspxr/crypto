@extends('layout.front')

@section('content')

<section class="hero-body">
    <div class="container">
        <div class="login">
            <h1 class="title">Вход</h1>
            <form action="{{ route('auth') }}" method="POST">
                @csrf

                <div class="field">
                  <label class="label">Электронная почта</label>
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
                      <p class="help is-danger">Что-то не так, попробуйте еще раз</p>
                  @endif
                </div>
                <div class="field">
                  <label class="label">Пароль</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input" type="password" placeholder="Пароль" name="password">
                    <span class="icon is-small is-left">
                      <i class="fa fa-key"></i>
                    </span>
                  </div>
                </div>

                <div class="field login-button">
                    <button class="button is-default" type="submit">
                        Войти
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
