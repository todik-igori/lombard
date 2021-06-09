<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Админка: @yield('title')</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
    <script src="/js/script.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                Вернуться на сайт
            </a>
            <div id="navbar" class="collapse navbar-collapse">
                @if(Auth::check() && Auth::user()->is_admin==1)
                <ul class="nav navbar-nav">
                    <li><a
                            href="{{route('categories.index')}}">Категории</a></li>
                    <li><a href="{{route('products.index')}}">Товары</a>
                    </li>
                    <li><a href="{{route('home')}}">Заказы</a></li>
                    <li><a href="{{route('application.index')}}">Онлайн оценка</a></li>
                </ul>
                @endif
                    @if(Auth::check() && Auth::user()->is_admin==0)
                        <ul class="nav navbar-nav">
                        <li><a href="{{route('application.index')}}">Онлайн оценка</a></li>
                        </ul>
                    @endif
                @guest
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                        </li>
                    </ul>
                @endguest

                @auth
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>
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
