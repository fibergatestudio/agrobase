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
    <!-- New -->
    <link rel="stylesheet" href="css/style.css">
    

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div class="body-overlay"></div>
    <div class="sidebar">
        <div class="menu-mobile-wrapper">
            <a class="logo-image-mobile" href="#"><span>Логотип</span></a>
            <div class="menu_burger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            <!-- Mobile menu sections (start)-->
            <div class="mobile-navigation">
                <div class="mobile-languages">
                    <ul class="mobile-languages_inner">
                        <li class="mobile-languages_item"><a href="#"><img src="image/gm-small.jpg"
                                    alt="german"></a></li>
                        <li class="mobile-languages_item"><a href="#"><img src="image/ru-small.jpg"
                                    alt="russian"></a></li>
                        <li class="mobile-languages_item"><a href="#"><img src="image/uk-small.jpg"
                                    alt="english"></a></li>
                    </ul>
                </div>
                <div class="mobile-menu">
                    <ul class="mobile-menu_inner">
                        <li class="mobile-menu_item"><a href="{{ url('/all_tables') }}">Фермеры</a></li>
                        <li class="mobile-menu_item"><a href="{{ url('/all_tables_international') }}">Ипортеры ЕС</a></li>
                        <li class="mobile-menu_item"><a href="#">Экспортеры СНГ</a></li>
                        <li class="mobile-menu_item"><a href="{{ url('/advert/create/') }}">Добавить объявление</a></li>
                        <li class="mobile-menu_item"><a href="{{ route('login') }}">Вход</a></li>
                        <li class="mobile-menu_item separator"><a href="{{ route('register') }}">Регистрация</a></li>
                        <li class="mobile-menu_item"><a href="{{ url('/admin/users') }}">Управление Пользователями</a></li>
                        <li class="mobile-menu_item"><a href="#{{ url('/admin/tables_control') }}">Управление Таблицами</a></li>
                        <li class="mobile-menu_item"><a href="{{ url('/admin/adverts_control') }}">Управление Объявлениями</a></li>
                        <li class="mobile-menu_item"><a href="{{ url('/import') }}">Импорт</a></li>
                        <li class="mobile-menu_item"><a href="{{ url('/change_password/') }}">Изменить пароль</a></li>
                        <li class="mobile-menu_item"><a href="{{ url('/advert/create/') }}">Добавить Объявление</a></li>
                        <li class="mobile-menu_item"><a href="{{ route('logout') }}">Выйти</a></li>
                    </ul>
                </div>
            </div>
            <!-- Mobile menu sections (end)-->

        </div>
        <nav class="navigation menu_title-wrapper">
            <ul class="menu_title-inner">
                <li class="menu_title-item"><a href="{{ url('/admin/users') }}">Управление Пользователями</a></li>
                <li class="menu_title-item"><a href="{{ url('/admin/tables_control') }}">Управление Таблицами</a></li>
                <li class="menu_title-item"><a href="{{ url('/admin/adverts_control') }}">Объявление Объявлениями</a></li>
                <li class="menu_title-item"><a href="{{ url('/import') }}">Импорт</a></li>
                <li class="menu_title-item"><a href="{{ url('/change_password/') }}">Изменить пароль</a></li>
                <li class="menu_title-item"><a href="{{ url('/advert/create/') }}">Добавить Объявление</a></li>
                <li class="menu_title-item"><a href="{{ route('logout') }}">Выйти</a></li>
            </ul>
        </nav>
    </div>
    <header class="header">
        <div class="languages">
            <ul class="languages_inner">
                <li class="languages_item"><a href="#"><img src="image/gm.jpg" alt="german"></a></li>
                <li class="languages_item"><a href="#"><img src="image/ru.jpg" alt="russian"></a></li>
                <li class="languages_item"><a href="#"><img src="image/uk.jpg" alt="english"></a></li>
            </ul>
        </div>
        <div class="logo_wrapper">
            <div class="logo-image"><a href="{{ url('/') }}">Логотип</a></div>
            <div class="title-image"><a href="{{ url('/') }}">AgroFoodExport</a></div>
        </div>
        <div class="header_menu">
            <div class="header_menu-item">
                <a class="header_menu-link" href="{{ url('/all_tables') }}">
                    Фермеры
                </a>
            </div>
            <div class="header_menu-item">
                <a class="header_menu-link" <a href="{{ url('/all_tables_international') }}">
                    Импортеры ЕС
                </a>
            </div>
            <div class="header_menu-item">
                <a class="header_menu-link" href="#">
                    Экспортеры СНГ
                </a>
            </div>
            <div class="header_menu-item">
                <a class="header_menu-link" href="{{ url('/advert/create/') }}">
                    Добавить<br> объявление
                </a>
            </div>
            @guest
            <div class="header_menu-item">
                <a class="header_menu-link" href="{{ route('login') }}">
                    Вход
                </a>
            </div>
            <div class="header_menu-item">
                <a class="header_menu-link" href="{{ route('register') }}">
                    Регистрация
                </a>
            </div>
            @endguest
        </div>
    </header>


        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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


                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Вход</a>
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
                                    <a class="dropdown-item" href="{{ url('/change_password/') }}">
                                        Изменить пароль
                                    </a>
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
        </nav> -->

        <!-- <main class="py-4 row">
            <div class="col-md-10">
            @yield('content')
            </div>
            @if(Route::current()->getName() != 'tables.index')
            <div style="height:600px; overflow:auto;" class="col-md-2">
                <h5 class="font-weight-bold mb-3">Обьявления</h5>
                @if(!empty(array_filter((array)$adverts)))
                    @foreach($adverts as $adv)
                    <div class="card" style="width: auto;">
                        <ul @if($adv->status == 'confirmed') style="background-color: #e8fbe8;" @endif class="list-group list-group-flush">
                            <li style="padding: 0;" class="list-group-item">
                            @if( $adv->action == 'Купить')
                                <div class="alert alert-primary">Покупка</div>
                            @else
                                <div class="alert alert-success">Продажа</div>
                            @endif
                            </li>
                            <li class="list-group-item">Дата: 
                                <b> 
                                <?php
                                    $timestamp = strtotime( $adv->created_at ); 
                                    $final_date = date('d-M-Y', $timestamp );
                                    echo add_weekday( $final_date ); 
                                ?>
                                </b>
                            </li>
                            <li class="list-group-item">Предприятие: <a href="{{ url('/user_cards/' . $adv->creator_id ) }}"><b>{{ $adv->creator_name }}</b></a></li>
                            <li class="list-group-item">Товар: <b>{{ $adv->prod }}</b></li>
                            <li class="list-group-item">Место поставки: <b>{{ $adv->sale_place }}</b></li>
                            <li class="list-group-item">Вид поставки: <b>{{ $adv->delivery }}</b></li>
                            <li class="list-group-item">Цена: <b>{{ $adv->price }} {{ $adv->currency }}</b> за тонну</li>
                            @if(!empty($adv->prod_photo))
                            <img class="list-group-item" src="{{ $adv->prod_photo }}" height="300">
                            @endif
                        </ul>
                    </div>
                    @endforeach
                @else
                    Нет обьявлений!
                @endif
            </div>
            @endif
        </main> -->
        <section class="start-page">

            <div class="start-page_wrapper">
            <div class="tables">
                @yield('content')
            </div>
            <div class="advertisement">
                <div class="advertisement_wrapper">
                @if(Route::current()->getName() != 'tables.index')
                    <h3 class="advertisement_title">Объявления</h3>
                    @if(!empty(array_filter((array)$adverts)))
                        @foreach($adverts as $adv)
                        <div class="advertisement_item">
                            <div class="advertisement_item-title">
                            @if( $adv->action == 'Купить')
                                Покупка
                            @else
                                Продажа
                            @endif
                            </div>
                            <div class="advertisement_item-string">
                                <p class="item-left-side">Дата:</p>
                                <p class="item-right-side">                                
                                <?php
                                    $timestamp = strtotime( $adv->created_at ); 
                                    $final_date = date('d-M-Y', $timestamp );
                                    echo add_weekday( $final_date ); 
                                ?>
                                </p>
                            </div>
                            <div class="advertisement_item-string">
                                <p class="item-left-side">Предприятие:</p>
                                <p class="item-right-side"><a href="{{ url('/user_cards/' . $adv->creator_id ) }}"><b>{{ $adv->creator_name }}</b></a></p>
                            </div>
                            <div class="advertisement_item-string">
                                <p class="item-left-side">Товар:</p>
                                <p class="item-right-side">{{ $adv->prod }}</p>
                            </div>
                            <div class="advertisement_item-string">
                                <p class="item-left-side">Место поставки:</p>
                                <p class="item-right-side">{{ $adv->sale_place }}</p>
                            </div>
                            <div class="advertisement_item-string">
                                <p class="item-left-side">Вид поставки:</p>
                                <p class="item-right-side">{{ $adv->delivery }}</p>
                            </div>
                            <div class="advertisement_item-string">
                                <p class="item-left-side">Цена:</p>
                                <p class="item-right-side">{{ $adv->price }} {{ $adv->currency }}н за тонну</p>
                            </div>
                        </div> 
                        @endforeach
                    @else
                        Нет обьявлений!
                    @endif
                @endif
                </div>

            </div>
            </div>

        </section>

    <footer class="footer">
        <div class="footer-wrapper">
            <div class="footer-inner footer-left">
                <h3 class="footer-inner_title">Контактные Данные</h3>
                <p class="footer-inner_contacts">г.Название города ул.Название д.3</p>
                <p class="footer-inner_contacts">(067) 123-45-67</p>
                <p class="footer-inner_contacts">почта@gmail.com</p>
                <p class="footer-inner_contacts">Пн.-Пт.:8:00 - 18:00</p>
                <p class="footer-inner_contacts">Сб.-Вс: ВЫХОДНОЙ</p>

            </div>
            <div class="footer-inner footer-right">
                <h3 class="footer-inner_title">Информация о Предприятии</h3>
                <p class="footer-inner_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. lrem
                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. lrem ipsum dolor sit amet,
                    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

            </div>
        </div>

    </footer>
    <!-- New -->
    <script src="js/app.js"></script>
    <script>
    
    (function (){
        let burgerButton = document.querySelector('.menu_burger');
        let burgerMenu = document.querySelector('.menu_title-wrapper');
        let sideBar = document.querySelector('.sidebar');
        let mobileMenu = document.querySelector('.mobile-navigation');
        let overlay = document.querySelector('.body-overlay');
        
        burgerButton.addEventListener('click', burgerClass);
        overlay.addEventListener('click', burgerClass);
        
        function burgerClass() {
            burgerButton.classList.toggle('active');
            burgerMenu.classList.toggle('active');
            sideBar.classList.toggle('active');
            overlay.classList.toggle('active');
            mobileMenu.classList.toggle('active');
        };
        }) ();
    
    </script>
    @yield('scripts')
</body>
</html>


<?php 

function add_weekday( $date ) {
    $ru_months = array( 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' );
    $en_months = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
    $en_date = str_replace($en_months,$ru_months, $date );
    //$weekdays = $en_date === $date ? $en_weekdays : $ru_weekdays;
    // $wday = strptime( $en_date, '%B %e, %Y' );       // Linux/Mac
    // return $weekdays[ $wday['tm_wday']-1 ]." $date"; // Linux/Mac
    //return $weekdays[ DateTime::createFromFormat( 'M j, Y', $en_date )->format( 'N' )-1 ]." $date"; // PHP 5.3+
    return $en_date;
 }
 //echo add_weekday( 'Октябрь 13, 2015' ); // Вторник Октябрь 13, 2015

?>