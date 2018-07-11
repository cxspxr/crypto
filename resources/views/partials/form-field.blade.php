
@if(!isset($value))
    {{ $value = null }}
@endif

<div class="field">
  <label class="label">
      @if(!isset($optional))
          *
      @endif
      {{ $placeholder }}
  </label>
  <div class="control has-icons-left has-icons-right">
    <input class="input {{ $errors->has($name) ? 'is-danger' : '' }}" type="{{ isset($type) ? $type : 'text' }}"
        placeholder="{{ isset($optional) ? '' : '*' }}{{ $placeholder }}" value="{{ old($name) ? old($name) : $value}}" name="{{ $name }}">
    <span class="icon is-small is-left">
      <i class="fa fa-{{ $fa }}"></i>
    </span>
    @if($errors->has($name))
        <span class="icon is-small is-right">
          <i class="fa fa-exclamation-triangle"></i>
        </span>
    @endif
  </div>
  @if($errors->has($name))
      <p class="help is-danger">{{ $errors->first($name) }}</p>
  @endif
</div>
