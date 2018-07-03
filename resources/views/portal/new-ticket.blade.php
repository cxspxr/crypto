@extends('layout.portal')

@section('head')
    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@endsection

@section('content')
    <h1 class="title">
        Новый запрос в поддержку 
        @if(isset($sell))
            по транзакции от
            {{ $sell->date }} ({{ $sell->ticker->name }})
        @endif
    </h1>
    
    <div id="status">
        @include('partials.status', ['show_errors' => true])
    </div>
    <div class="ticket-editor">

    </div>
    <div id="ticket">
        @if(isset($sell))
            <form action="{{ route('portal.create-ticket-for-sell', $sell->id) }}" method="POST">
        @else
            <form action="{{ route('portal.create-ticket') }}" method="POST">
        @endif
            {{ csrf_field() }}
            <input type="hidden" name="content" v-model="data">
            <button
                class="ticket-button button is-primary"
                type="submit"
            >
                Отправить
            </button>
        </form>
    </div>
    
@endsection

@section('scripts')
    
        <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
        <script>
            var imageUploadURL = "{{ route('portal.upload-image') }}";
            var websiteURL = "{{ url('/') }}";
        </script>
        <script src="{{ asset('js/ticket.js') }}"></script>
    
@endsection