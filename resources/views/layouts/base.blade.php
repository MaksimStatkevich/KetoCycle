<!DOCTYPE html>
<html lang="ru">

    @section('head')
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/custom.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    @show
<body>

    @section('header')
        <header class="header">
            <div class="container-xl">

                <div class="header__logo mx-auto">
                    <picture><source srcset="img/Logo.avif" type="image/avif"><source srcset="img/Logo.webp" type="image/webp"><img src="img/Logo.png" alt="logo" class="header__img"></picture>

                </div>
            </div>

        </header>
    @show

    @section('content')
    @show

    <!-- подключаем js -->
    @section('footerScripts')
        <script src="../js/main.js"></script>
        <script src="../js/custom.js"></script>
    @show

</body>

</html>

