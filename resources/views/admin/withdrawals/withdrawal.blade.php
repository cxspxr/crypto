@extends('admin.layout.layout')

@section('title')
    Вывод пользователя {{ $withdrawal->user->email }}
@endsection

@section('content')

<div class="show-withdrawal">
    <div id="status">
        @include('partials.status')
    </div>

    <form action="{{ route('admin.change-withdrawal-status', $withdrawal->id) }}" method="POST">
        @csrf

        @include('partials.form-field', [
            'name' => 'amount',
            'placeholder' => 'Сумма (руб.)',
            'fa' => 'money',
            'value' => $withdrawal->amount
        ])

        <div class="control">
            <label for="cancelled" class="radio">
                <input type="radio" id="cancelled" name="status_id"
                    value="{{ $cancelled_status}}" {{ $withdrawal->status_id == $cancelled_status ? 'checked' : '' }}>
                Отменено
            </label>
            <label for="processing" class="radio">
                <input type="radio" id="processing" name="status_id"
                    value="{{ $processing_status }}"  {{ $withdrawal->status_id == $processing_status ? 'checked' : '' }}>
                Выполнение
            </label>
            <label for="complete" class="radio">
                <input type="radio" id="complete" name="status_id"
                    value="{{ $complete_status }}"  {{ $withdrawal->status_id == $complete_status ? 'checked' : '' }}>
                Выполнено
            </label>
        </div>

        <div class="form-buttons">
            <button type="submit" class="submit-button button is-primary">
                Сохранить изменения
            </button>
        </div>
    </form>

</div>

@endsection
