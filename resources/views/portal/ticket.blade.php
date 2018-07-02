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

    <div id="modal">
        <b-modal :active.sync="isAnswerModalActive">
            <div class="modal-content" v-html="currentAnswer"></div>
        </b-modal>
        <div class="ticket-answer message is-primary" @click='openModal(@json($ticket->content))'>
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
                 @click='openModal(@json($answer->content))'
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
                    {!! $answer->content !!}
                </div>
            </div>
        @endforeach
    </div>


    @if($ticket->open)
        <div id="status">
            @include('partials.status')
        </div>
        <div class="ticket-editor">

        </div>
        <div id="ticket">
            <form action="{{ route('portal.create-answer', $ticket->id) }}" method="POST">
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
    @endif

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
