@extends('admin.layout.layout')

@section('title', 'Пользователи')

@section('content')
    <div id="dashboard">

        @if(count($users))
            <p class="admin-page-desc">
                Нажмите на пользователя для его редактирования
            </p>
            <table class="table has-mobile-cards">
                <thead>
                    <tr>
                        <th>Имейл</th>
                        <th>Баланс</th>
                        <th class="mobile--hidden">Продажи</th>
                        <th class="mobile--hidden">Индивидуальная комиссия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr
                            @click="redirectTo('{{ route('admin.user', $user->id) }}')"
                            class="tr"
                        >
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->pretty_balance }}</td>
                            <td class="mobile--hidden">{{ count($user->sells) }}</td>
                            <td class="mobile--hidden">{{ $user->commission ? $user->commission . '%' : '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $paginatedUsers->links('pagination.bulma-pagination') }}
        @else
            У Вас нет пользователей.
        @endif
    </div>
@endsection

@section('scripts')

<script src="{{ asset('js/admin-dashboard.js') }}"></script>

@endsection
