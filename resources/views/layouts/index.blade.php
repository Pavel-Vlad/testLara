<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Главная</title>
</head>
<body class="body">
    <aside class="aside">
        <div class="logo">
            <div class="logo__img-wrap">
                <img src="{{asset('img/logo.svg')}}" alt="логотип компании">
            </div>
            <div class="logo__text">
                Enterprise
                Resource
                Planning
            </div>
        </div>
        <nav>
            <ul class="aside__menu">
                <li><a href="##" class="aside__link">Продукты</a></li>
            </ul>
        </nav>
    </aside>
    @yield('page')

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
