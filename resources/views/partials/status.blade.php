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
