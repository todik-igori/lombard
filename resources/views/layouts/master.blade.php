<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ломбард: @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="/slick/slick.min.js"></script>
    <script src="/js/script.js" defer></script>
    <script src="/js/slider.js" defer></script>





</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="{{route('main')}}"><img src="/img/logo.svg" alt="" style="width: 100px;height: 50px;"></a>
            <a class="navbar-brand" href="{{route('main')}}" style="color: #eebd00">«Ломбард Содействие»</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @routeactive('index')><a href="{{route('index')}}">Все товары</a></li>
                <li @routeactive('categor*')><a href="{{route('categories')}}">Категории</a>
                </li>
                <li @routeactive('basket*')><a href="{{route('basket')}}">В корзину</a></li>
               {{-- <li><a href="{{route('reset')}}">Сбросить проект в начальное состояние</a></li>--}}

               {{-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">₽<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/RUB">₽</a></li>
                        <li><a href="/USD">$</a></li>
                        <li><a href="/EUR">€</a></li>
                    </ul>
                </li>--}}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{route('login')}}">Войти</a></li>
                @endguest

                @auth
                    @if(Auth::user()->isAdmin())
                            <li><a href="{{route('home')}}">Админ панель</a></li>

                        @else
                            <li><a href="{{route('orders.index')}}">Мои заказы</a></li>
                            <li><a href="{{route('application.create')}}">Онлайн оценка</a></li>
                        @endif
                <li><a href="{{route('get-logout')}}">Выйти</a></li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}}</p>
        @endif
            @if(session()->has('warning'))
                <p class="alert alert-warning">{{session()->get('warning')}}</p>
            @endif
    @yield('content'){{--Директива @yield используется для отображения содержимого данной секции--}}
    </div>
</div>
</body>
<footer class="page-footer font-small unique-color-dark" >

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="color: white">© 2020 Copyright:
        <a href="#"> by Igor</a>
    </div>
    <!-- Copyright -->

</footer>
</html>
