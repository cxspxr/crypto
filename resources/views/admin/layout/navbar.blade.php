<aside class="menu">
    <p class="menu-label">
        Общее
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.dashboard') }}" class="@isRoute('admin.dashboard')">Пользователи</a></li>
        <li><a href="{{ route('admin.sells')}} " class="@isRoute('admin.sells')">Продажи</a></li>
    </ul>
    <p class="menu-label">
        Администрирование
    </p>
    <ul class="menu-list">
        <li><a href="" class="@isRoute('admin.dashboard')">Валюты</a></li>
        <li>
            <a href="" class="@isRoute('admin.dashboard')">Настройки</a>
            <ul>
                <li><a href="" class="@isRoute('admin.dashboard')">Комиссия</a></li>
                <li><a href="" class="@isRoute('admin.dashboard')">Пороговая комиссия</a></li>
                <li><a href="" class="@isRoute('admin.dashboard')">Программа лояльности</a></li>
                <li><a href="" class="@isRoute('admin.dashboard')">Лимит на вывод</a></li>
                <li><a href="" class="@isRoute('admin.dashboard')">Лимит на ожидание выполнения заявки на продажу</a></li>
            </ul>
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
