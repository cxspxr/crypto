@extends('layout/portal')

@section('content')

<div class="sell" id="sell" v-cloak>
    <h1 class="page-title">Продажа</h1>
    @include('partials.status')
    <form action="{{ route('portal.make-order') }}" method="POST">
        @csrf

        <div class="field">
          <tickers placeholdervalue="*Валюта" labelvalue="*Валюта" :currencies='@json($tickers)'></tickers>
          @if($errors->has('ticker_id'))
              <p class="help is-danger">{{ $errors->first('ticker_id') }}</p>
          @endif
        </div>
        @include('partials.form-field', [
            'name' => 'transaction',
            'placeholder' => 'ID транзакции',
            'fa' => 'key'
        ])
        

        <div class="field login-button">
            <button class="button is-primary" type="submit">
                Подать заявку
            </button>
        </div>
    </form>
</div>

@endsection

@section('scripts')

<script src="{{ asset('js/sell.js') }}"></script>

@endsection
