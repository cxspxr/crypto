@extends('layout/portal')

@section('content')

<div class="withdraw" id="withdraw">
    <h1 class="page-title">Вывод денег</h1>
    @include('partials.status')
    <form action="{{ route('portal.create-withdrawal') }}" method="POST">
        @csrf

        <div class="field">
          <label class="label">*Сумма</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('amount') ? 'is-danger' : '' }}" type="text"
                placeholder="*(1.23, 300, ...)" value="{{ old('amount') }}" name="amount">
            <span class="icon is-small is-left">
              <i class="fa fa-dollar"></i>
            </span>
            @if($errors->has('amount'))
                <span class="icon is-small is-right">
                  <i class="fa fa-exclamation-triangle"></i>
                </span>
            @endif
          </div>
          @if($errors->has('amount'))
              <p class="help is-danger">{{ $errors->first('amount') }}</p>
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

<script src="{{ asset('js/withdraw.js') }}"></script>

@endsection
