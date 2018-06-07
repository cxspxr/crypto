<div class="navbar">
    <a href="{{ route('home') }}" class="navbar-logo">
        <img src="{{ asset('img/logo.png') }}" alt="">
    </a>

    <div class="navbar-right">
        <nav class="navbar-menu">
            <a href="{{ route('sell') }}" class="navbar-link">Продажа</a>
            <a href="{{ route('rules') }}" class="navbar-link">Правила</a>
            <a href="{{ route('contact') }}" class="navbar-link">Контакты</a>
        </nav>

        <div class="navbar-auth">
            <a href="{{ route('auth.login') }}" class="navbar-link--auth">Вход</a>
            <a href="{{ route('auth.signup') }}" class="navbar-link--auth">Регистрация</a>
        </div>
    </div>
</div>
