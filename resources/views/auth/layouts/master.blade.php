{{-- Для оптимазции, мы создаем шаблоны, это основной шаблон - мастер шаблон, где находятся все ключевые теги, котрые есть в других макетах --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="KsSuYKnA4EytAfis4gZiz98Tx08rZRW5zGgktba">

    <title>Админка: @yield('title')</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{route('index')}}">
                Вернуться на сайт
            </a>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    {{-- для отбражения панели только для админа --}}
                    {{-- пользователь авторизован и является админом-иначе выдаст ошибку --}}
                    @if(Auth::check()&&Auth::user()->roleAdmin())
                    <li class="nav-item"><a class="nav-link" href="{{route('categories.index')}}">Категории</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('products.index')}}">Товары</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('images.index')}}">Галлерея</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('users.index')}}">Пользователи</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Заказы</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Пользователи</a></li> --}}
                    @endif
                </ul>
                {{-- дерективы blade для авторизованного пользователя и гостя --}}
                        @guest
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item">
                                {{-- маршруты мы добавляем здесь просматривая через php artisa route:list --}}
                                <a class="nav-link" href="{{route('login')}} ">Войти</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}">Зарегистрироваться</a>
                            </li>
                        </ul>
                        @endguest
                    {{-- дерективы blade для авторизованного пользователя и гостя --}}

                    @auth
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{-- для отображении названия панели Админ --}}
                            @if(Auth::check()&&Auth::user()->roleAdmin())Администратор
                            {{-- для отображения панели с именем зарегестрированнго пользователя без прав админа --}}
                            @else {{ Auth::user()->name }}
                            @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('logout')}}"
                                onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                                  Выйти</a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                               @csrf
                            </form>
                             {{-- для отображении названия панели Админ --}}
                            @if(Auth::check()&&Auth::user()->roleAdmin())
                            {{-- кнопка сброса до исходного состояния --}}
                            {{-- <a class="dropdown-item" href="{{route('reset')}}"
                                onclick="event.preventDefault();
                                                  document.getElementById('reset-form').submit();">
                                                  Reset</a> --}}
                            {{-- <form id="reset-form" action="{{route('reset')}}" method="GET" style="display: none;">
                               @csrf
                            </form> --}}
                            @endif
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
            {{-- отображение иноформации о сбросе --}}
            @if(session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}}</p>
            @endif
            @yield('content')

        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('.js-select2').select2({
            placeholder: "Выберите товар",
            maximumSelectionLength: 2,
            language: "ru"
        });
    });
    </script>
</body>
</html>
