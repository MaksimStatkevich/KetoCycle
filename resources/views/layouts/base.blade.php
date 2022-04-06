<!DOCTYPE html>
<html lang="{{ app()->getLocale() ?? 'en' }}">

@section('head')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Title</title>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="//fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
@show
<body>

@section('header')
    <header class="header">
        <div class="container-xl">

            <div class="header__logo mx-auto">
                <picture>
                    <source srcset="img/Logo.avif" type="image/avif">
                    <source srcset="img/Logo.webp" type="image/webp">
                    <img src="img/Logo.png" alt="logo" class="header__img">
                </picture>

            </div>
        </div>

    </header>
@show

@section('content')
@show

@section('footerScripts')
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @stack('child-scripts')
@show

</body>

</html>

