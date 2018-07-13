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
            <a href="{{ route('admin.commissions') }}" class="@isRoute('admin.commissions')">Комиссии</a>
        </li>
        <li>
            <a href="">

            Поддержка
            @if($open_tickets)
                ({{ $open_tickets }} тикетов)
            @endif
            @if($unread_requests)
                ({{ $unread_requests }} ответов)
            @endif
            </a>
        </li>
    </ul>

</aside>
