<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/buefy/lib/buefy.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('head')
</head>
<body>

    <div class="admin-page-container">
        <div class="columns admin-page">
            <div class="column is-one-fifth">
                @include('admin.layout.navbar')
            </div>
            <div class="column">
                <h1 class="admin-page-title">@yield('title')</h1>
                <div class="admin-page-content">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer>
            Cryptovault &copy; <span id="date"></span>
        </footer>
    </div>
    @include('admin.layout.footer')


    <script type="text/javascript" src="{{ asset('js/admin-common.js') }}"></script>
    @yield('foot')

    @yield('scripts')

</body>
</html>
