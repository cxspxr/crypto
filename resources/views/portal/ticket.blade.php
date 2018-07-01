@extends('layout/portal')

@section('head')
    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@endsection

@section('content')

<div class="ticket">
    <h1 class="title">
        Запрос в поддержку по транзакции от
        {{ $ticket->sell->date }} ({{ $ticket->sell->ticker->name }})
    </h1>

    <div class="ticket-answer message is-primary">
        <div class="message-header">
            <p>Вы</p>
        </div>
        <div class="message-body">
            {!! $ticket->content !!}
        </div>
    </div>
    @foreach($ticket->answers as $answer)
        <div
            class="ticket-answer message is-{{ $answer->is_response ? 'danger' : 'success' }}"
        >
            <div class="message-header">
                <p>
                    @if($answer->is_response)
                        Поддержка
                    @else
                        Вы
                    @endif
                </p>
            </div>
            <div class="message-body">
                {!! $ticket->content !!}
            </div>
        </div>
    @endforeach


    <div class="ticket-editor">
          <p>Hello World!</p>
          <p>Some initial <strong>bold</strong> text</p>
          <p><br></p>
    </div>

</div>

@endsection

@section('scripts')
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="{{ asset('js/ticket.js') }}"></script>
@endsection
