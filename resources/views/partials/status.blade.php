<div class="status">
    @if(session('success'))

    <b-notification title="Все получилось!" type="is-success">
        {{ session('success') }}
    </b-notification>
    @endif

    @if(session('failure'))
        <b-notification title="Что-то пошло не так..." type="is-danger">
            {{ session('failure') }}
        </b-notification>

    @endif

    @if(isset($show_errors))
        @if($errors->any())
            <b-notification type="is-danger">
                {{ $errors->first() }}
            </b-notification>
        @endif
    @endif
</div>
