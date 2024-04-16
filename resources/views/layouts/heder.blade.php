
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моды для Dayz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</head>
<body class="d-flex flex-column min-vh-100">
<header>
    <div class="header-box">
    <div class="container ">
        <div class="row">
            <div class="col-sm-6"><br><br>
                <h1>Авторские моды для</h1></div>
            <div class="col-sm-6 dayz-logo"></div>
          </div>

    </div>
</div>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand logo" href="{{route('index')}}">RUSFORMA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="menu-link" aria-current="page" href="{{route('index')}}">Главная</a>
        </li>
        <li class="nav-item">
          <a class="menu-link" href="{{route('categories')}}">Все товары</a>
        </li>
        {{-- <li class="nav-item">
          <a class="menu-link" href="instruct.html">Инструкция по установке</a>
        </li> --}}
        <li class="nav-item"><div>
          <a class="menu-link" href="{{route('login')}}">
              <img src="{{asset('images/32.png')}}" alt=""></a></div>
        </li>
        <li class="nav-item">
          <a class="menu-link" href="{{route('basket')}}">
           {{-- @if(cookie()->has('ordercount')) --}}


            <span class="counter">


                {{session()->get('ordercount')}}
                {{-- {{$orderCount}} --}}
            </span>




        <img src="{{asset('images/korzina_myqvq7icqeo8_32.png')}}" alt="">
        </a>
        </li>


                    @auth
                    @if(Auth::user()->role_admin===1)
                      {{-- маршрут к заказам(если авторизованы и есть права админа) --}}
                          <li class="nav-item"><a class="menu-link" href="{{route('home')}}">Панель администратора</a></li>
                    {{-- маршрут к заказам(если авторизованы и нет прав админа) --}}
                    @else
                        <li><a class="menu-link" href="{{route('person.orders.index')}}">Мои заказы</a></li>
                    @endif
                    {{-- маршрут на выход из авторизации --}}
                         <li><a class="menu-link" href="{{route('get-logout')}}">Выйти</a></li>
                    @endauth


      </ul>

      <form class="d-flex" role="search" method="GET" action="{{route("categories")}}">

        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_name" id="search_name" value="{{ request()->search_name}}">
        <button class="btn btn btn-submit" type="submit"><img src="{{asset('images/poisk_8oaxj5oy4081_128.png')}}" alt=""></button>

      </form>
    </div>
  </div>
</nav>




</header>
