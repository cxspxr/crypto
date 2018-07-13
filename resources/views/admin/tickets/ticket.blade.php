@extends('admin.layout.layout')

@section('head')
    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@endsection


@section('title')
    Запрос в поддержку
    @if($ticket->sell)
        по транзакции от
        {{ $ticket->sell->date }} ({{ $ticket->sell->ticker->name }})
    @endif
@endsection

@section('content')

<div class="ticket">

    <div id="modal">
        <b-modal :active.sync="isModalShown">
            <div class="modal-content" v-html="current"></div>
        </b-modal>
        <div class="ticket-answer message is-primary" @click='openModal(@json($ticket->content))'>
            <div class="message-header">
                <p>Пользователь</p>
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
                            Вы
                        @else
                            Пользователь
                        @endif
                    </p>
                </div>
                <div class="message-body">
                    {!! $answer->content !!}
                </div>
            </div>
        @endforeach
    </div>


    @if($ticket->is_open)
        <div id="status">
            @include('partials.status', ['show_errors' => true])
        </div>
        <div class="ticket-editor">

        </div>
        <div id="ticket">
            <form action="{{ route('admin.create-answer', $ticket->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="content" v-model="data">
                <div class="form-buttons">

                    <button
                        class="ticket-button button is-primary"
                        type="submit"
                    >
                        Отправить
                    </button>
                </div>
            </form>
        </div>
    @endif

</div>

@endsection

@section('scripts')
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script>
        var imageUploadURL = "{{ route('admin.upload-image') }}";
        var websiteURL = "{{ url('/') }}";
    </script>
    <script src="{{ asset('js/ticket.js') }}"></script>
@endsection
