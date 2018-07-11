<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
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

    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/jquery"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    @yield('foot')

    <script type="text/javascript" src="{{ asset('js/admin-common.js') }}"></script>

    @yield('scripts')

</body>
</html>
