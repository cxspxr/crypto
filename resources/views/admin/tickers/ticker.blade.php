@extends('admin.layout.layout')

@section('title')

    @if(isset($ticker))
        Редактирование валюты {{ $ticker->pretty_ticker }}
    @else
        Новая валюта
    @endif

@endsection

@section('content')

<div class="show-ticker">
    <div id="status">
        @include('partials.status')
    </div>
    @if(isset($ticker))
        <form action="{{ route('admin.update-ticker', $ticker->id) }}" method="POST">
    @else
        <form action="{{ route('admin.create-ticker') }}" method="POST">
    @endif
        @csrf

        @include('partials.form-field', [
            'name' => 'name',
            'placeholder' => 'Название (полное)',
            'fa' => 'bitcoin',
            'value' => isset($ticker) ? $ticker->name : null
        ])

        @include('partials.form-field', [
            'name' => 'ticker',
            'placeholder' => 'Сокращение (BTC, XMR, BCH...)',
            'fa' => 'pencil',
            'value' => isset($ticker) ? $ticker->ticker : null
        ])

        @include('partials.form-field', [
            'name' => 'wallet',
            'placeholder' => 'Кошелек',
            'fa' => 'key',
            'value' => isset($ticker) ? $ticker->wallet : null
        ])

        <button type="submit" class="submit-button button is-primary">
            @if(isset($ticker))
                Сохранить изменения
            @else
                Добавить валюту
            @endif
        </button>
    </form>

</div>

@endsection
