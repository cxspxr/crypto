<aside class="menu">
    <p class="menu-label">
        Общее
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.dashboard') }}" class="@isRoute('admin.dashboard')">Пользователи</a></li>
        <li><a href="{{ route('admin.sells')}}" class="@isRoute('admin.sells')">Продажи</a></li>
    </ul>
    <p class="menu-label">
        Администрирование
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.tickers') }}" class="@isRoute('admin.tickers')">Валюты</a></li>
        <li>
            <a href="{{ route('admin.config') }}" class="@isRoute('admin.config')">Настройки</a>
        </li>
        <li>
            <a href="{{ route('admin.commissions') }}" class="@isRoute('admin.commissions')">Комиссии</a>
        </li>
        <li>
            <a href="{{ route('admin.withdrawals') }}" class="@isRoute('admin.withdrawals')">
                Выводы
                @if($open_withdrawals)
                    ({{ $open_withdrawals }} ожидающих)
                @endif
            </a>
        </li>
        <li>
            <a href="{{ route('admin.tickets') }}" class="@isRoute('admin.tickets')">

            Поддержка
            @if($open_tickets)
                ({{ $open_tickets }} открытых тикетов)
            @endif
            @if($unread_requests)
                ({{ $unread_requests }} новых ответов)
            @endif
            </a>
        </li>

        <li>
            <a href="{{ route('admin.logout') }}">
                <b>Выйти</b>
            </a>
        </li>
    </ul>

</aside>
