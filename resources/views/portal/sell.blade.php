@extends('layout/portal')

@section('content')

<div class="sell" id="sell" v-cloak>

    @include('partials.status')
    <form action="{{ route('portal.make-order') }}" method="POST">
        @csrf
        <div class="field">
          <label class="label">*ID транзакции</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('transaction') ? 'is-danger' : '' }}" type="text"
                placeholder="*Транзакция" value="{{ old('transaction') }}" name="transaction">
            <span class="icon is-small is-left">
              <i class="fa fa-key"></i>
            </span>
            @if($errors->has('transaction'))
                <span class="icon is-small is-right">
                  <i class="fa fa-exclamation-triangle"></i>
                </span>
            @endif
          </div>
          @if($errors->has('transaction'))
              <p class="help is-danger">{{ $errors->first('transaction') }}</p>
          @endif
        </div>

        <div class="field">
          <tickers placeholdervalue="*Валюта" labelvalue="*Валюта" :currencies='@json($tickers)'></tickers>
          @if($errors->has('ticker_id'))
              <p class="help is-danger">{{ $errors->first('ticker_id') }}</p>
          @endif
        </div>

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
