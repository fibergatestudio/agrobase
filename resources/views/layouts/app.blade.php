<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

     -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/all_tables') }}">
                    {{ config('app.name', 'Агробаза') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    @guest

                    @else
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav ml-1 mr-1">
                            <a href="{{ url('/all_tables') }}"><button class="btn btn btn-success">Фермер UA</button></a>
                        </ul>
                        <ul class="navbar-nav ml-1 mr-1">
                            <a href="{{ url('/all_tables_international') }}"><button class="btn btn btn-success">Таблицы Международн.</button></a>
                        </ul>
                        <ul class="navbar-nav ml-1 mr-1">
                            <a href="{{ url('/advert/create/') }}"><button class="btn btn btn-success">Добавить обьявление</button></a>
                        </ul>
                        @if(Auth::user()->role  == 'admin')
                        <ul class="navbar-nav ml-1 mr-1">
                            <a href="{{ url('/user_cards') }}"><button class="btn btn btn-success">Карточки пользователей</button></a>
                        </ul>
                        @endif
                    @endif


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Войти</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if(Auth::user()->role  == 'admin')
                                    <a class="dropdown-item" href="{{ url('/admin/users') }}">
                                        Управление Пользователями
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/admin/tables_control') }}">
                                        Управление Таблицами
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/admin/adverts_control') }}">
                                        Управление Обьявлениями
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/import') }}">
                                        Импорт
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ url('/advert/create/') }}">
                                        Добавить Обьявление
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 row">
            <div class="col-md-10">
            @yield('content')
            </div>
            <div style="height:600px; overflow:auto;" class="col-md-2">
                <h5 class="font-weight-bold mb-3">Обьявления</h5>
                @if(!empty(array_filter((array)$adverts)))
                    @foreach($adverts as $adv)
                    <div class="card" style="width: auto;">
                        <!-- <div class="card-body">
                            <p class="mb-0">{{ $adv->short_text }}</p>
                        </div> -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                            @if( $adv->action == 'Купить')
                                <div class="alert alert-primary">Покупка</div>
                            @else
                                <div class="alert alert-success">Продажа</div>
                            @endif
                            </li>
                            <li class="list-group-item">Предприятие: <a href="{{ url('/advert/view/' . $adv->id ) }}">ссылка</a></li>
                            <li class="list-group-item">Товар: {{ $adv->prod }}</li>
                            <li class="list-group-item">Место поставки: {{ $adv->sale_place }}</li>
                            <li class="list-group-item">Вид поставки: {{ $adv->delivery }}</li>
                            <li class="list-group-item">Цена: {{ $adv->price }}</li>
                            <li class="list-group-item">Валюта: {{ $adv->currency }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ url('/advert/view/' . $adv->id ) }}" class="card-link">Просмотреть</a>
                        </div>
                    </div>
                    @endforeach
                @else
                    Нет обьявлений!
                @endif
            </div>
        </main>
    </div>

    @yield('scripts')
</body>
</html>
