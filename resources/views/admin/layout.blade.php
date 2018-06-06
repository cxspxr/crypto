<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @yield('head')
</head>
<body>

    @yield('content')

    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/jquery"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    @yield('foot')

    <script type="text/javascript" src="{{ asset('js/admin-common.js') }}"></script>

    @yield('scripts')

</body>
</html>
