<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="msapplication-navbutton-color" content="#029bdc">
    <meta name="theme-color" content="#029bdc"> --}}
    <title>
        @hasSection('title')
            @yield('title')
        @else
            Cryptovault
        @endif
    </title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> --}}

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/buefy/lib/buefy.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('head')
</head>

<body>
