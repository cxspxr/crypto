@extends('admin.layout.layout')

@section('title', 'Общие настройки')

@section('content')

<div class="show-ticker">
    <div id="status">
        @include('partials.status')
    </div>
    <form action="{{ route('admin.update-config') }}" method="POST">
        @csrf

        @include('partials.form-field', [
            'name' => 'currency_rate',
            'placeholder' => 'Курс рубля (обновляется автоматически)',
            'fa' => 'dollar',
            'value' => $config->currency_rate
        ])

        @include('partials.form-field', [
            'name' => 'sell_lifetime',
            'placeholder' => 'Максимальное время ожидания до отмены продажи (в часах)',
            'fa' => 'clock-o',
            'value' => $config->sell_lifetime
        ])

        @include('partials.form-field', [
            'name' => 'withdrawal_limit',
            'placeholder' => 'Максимальная сумма вывода (руб.)',
            'fa' => 'money',
            'value' => $config->withdrawal_limit
        ])

        <div class="form-buttons">
            <button type="submit" class="submit-button button is-primary">
                Сохранить изменения
            </button>
        </div>
    </form>

</div>

@endsection
