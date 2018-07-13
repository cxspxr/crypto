@extends('admin.layout.layout')

@section('title')
    @if(isset($current_commission))
        Редактирование комисси от {{ $current_commission->from }} руб.
    @else
        Новая комиссии
    @endif

@endsection

@section('content')

<div class="show-ticker">
    <div id="status">
        @include('partials.status')
    </div>
    @if(isset($current_commission))
        <form action="{{ route('admin.update-commission', $current_commission->id) }}" method="POST">
    @else
        <form action="{{ route('admin.create-commission') }}" method="POST">
    @endif
        @csrf

        @include('partials.form-field', [
            'name' => 'from',
            'placeholder' => 'Порог (от X руб.)',
            'fa' => 'money',
            'value' => isset($current_commission) ? $current_commission->from : null
        ])

        @include('partials.form-field', [
            'name' => 'commission',
            'placeholder' => 'Комиссия (%)',
            'fa' => 'percent',
            'value' => isset($current_commission) ? $current_commission->commission * 100 : null
        ])

        <div class="form-buttons">
            <button type="submit" class="submit-button button is-primary">
                @if(isset($current_commission))
                    Сохранить изменения
                @else
                    Добавить комиссию
                @endif
            </button>

            @if(isset($current_commission))
                <a href="{{ route('admin.delete-commission', $current_commission->id) }}" class="button is-danger">
                    Удалить комиссию
                </a>
            @endif
        </div>
    </form>

</div>

@endsection
