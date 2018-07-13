@extends('admin.layout.layout')

@section('title', 'Комиссии')

@section('content')
    <div id="commissions">

        <div id="status">
            @include('partials.status')
        </div>
        @if(count($commissions))
            <p class="admin-page-desc">
                Нажмите на комиссию для её редактирования
            </p>
            <table class="table has-mobile-cards">
                <thead>
                    <tr>
                        <th>Порог</th>
                        <th>Комиссия (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commissions as $commission)
                        <tr
                            @click="redirectTo('{{ route('admin.commission', $commission->id) }}')"
                            class="tr"
                        >
                            <td>от {{ $commission->from }} руб.</td>
                            <td>{{ $commission->commission * 100 }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <a href="{{ route('admin.add-commission') }}" class="button is-primary">
                Добавить комиссию
            </a>
            {{ $paginatedCommissions->links('pagination.bulma-pagination') }}
        @else
            У Вас нет коммиссий.

            <a href="{{ route('admin.add-ticker') }}" class="button is-primary">
                Добавить комиссию
            </a>
        @endif
    </div>
@endsection

@section('scripts')

<script src="{{ asset('js/admin-commissions.js') }}"></script>

@endsection
