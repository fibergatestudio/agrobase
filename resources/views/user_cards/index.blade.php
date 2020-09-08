@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">



<div class="cards-main">
                <div class="cards-wrapper">
                    <h3 class="cards-title">Карточки пользователей</h3>
                    <div class="cards-scroll-container">
                        <div class="cards-scroll-inner">
                    <div class="cards-top">
                        <div class="cards-top_title">#</div>
                        <div class="cards-top_title">Название</div>
                        <div class="cards-top_title">Регистрационный <br> код</div>
                        <div class="cards-top_title">Адрес</div>
                        <div class="cards-top_title">
                            <div class="cards-top_title--block">Телефон</div>
                            <div class="cards-top_title--block">E-Mail</div>
                            <div class="cards-top_title--block">Web-Site</div>
                       </div>
                        <div class="cards-top_title">Контактное лицо</div>
                    </div>
                    @foreach($users as $user)
                    <div class="cards-string">
                        <div class="cards-string_inner">{{ $user->id }}.</div>
                        <div class="cards-string_inner"><a href="{{ url('/user_cards/'. $user->id) }}">{{ $user->name }}</a></div>
                        <div class="cards-string_inner">{{ $user->reg_code }}</div>
                        <div class="cards-string_inner">{{ $user->address }}</div>
                        <div class="cards-string_inner">
                            <div class="cards-string_inner--block"><a class="cards-string_phone" href="tel:{{ $user->phone }}">Позвонить</a></div>
                            <div class="cards-string_inner--block"><a class="cards-string_email" href="mailto:{{ $user->email }}">Написать</a></div>
                            <div class="cards-string_inner--block"><a class="cards-string_web" href="mailto:{{ $user->website }}">Перейти на сайт</a></div>
                        </div>
                        <div class="cards-string_inner">Константин Иванович</div>
                    </div>
                    @endforeach
                </div>
                </div>
                </div>
                <button class="tables-btn">Добавить пользователя</button>
            </div>
            
            <!-- cards-mobile-version -->
            <div class="cards-mobile-main">
                <div class="cards-mobile-wrapper">
                    <h3 class="cards-mobile-title">Карточки пользователей</h3>
                    @foreach($users as $user)
                    <div class="cards-mobile-string">
                        <div class="mobile-string_left">
                            <div class="mobile-left-inner">#</div>
                            <div class="mobile-left-inner">Название</div>
                            <div class="mobile-left-inner">Регистрационный код</div>
                            <div class="mobile-left-inner">Адрес</div>
                            <div class="mobile-left-inner">Телефон</div>
                            <div class="mobile-left-inner">E-mail</div>
                            <div class="mobile-left-inner">E-mail, web-site</div>
                            <div class="mobile-left-inner">Контактное лицо</div>
                        </div>
                        <div class="mobile-string_right">
                            <div class="mobile-right-inner">{{ $user->id }}</div>
                            <div class="mobile-right-inner"><a href="{{ url('/user_cards/'. $user->id) }}">{{ $user->name }}</a></div>
                            <div class="mobile-right-inner">{{ $user->reg_code }}</div>
                            <div class="mobile-right-inner">{{ $user->address }}</div>
                            <div class="mobile-right-inner"><a class="cards-string_phone" href="tel:{{ $user->phone }}">Позвонить</a></div>
                            <div class="mobile-right-inner"><a class="cards-string_email" href="mailto:{{ $user->email }}">Написать</a></div>
                            <div class="mobile-right-inner"><a class="cards-string_web" href="mailto:{{ $user->website }}">Перейти на сайт</a></div>
                            <div class="mobile-right-inner">Константин Иванович</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="tables-btn cards-btn">Добавить пользователя</button>
            </div>

    <div style="display:none;" class="container-fluid">
    <h1> Карточки пользователей</h1>
        <div class="row">
                <table class="table table-bordered data-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Наименование</th>
                            <th>Регистрационный код</th>
                            <th>Адрес</th>
                            <th>Телефон</th>
                            <th>E-mail</th>
                            <th>Сайт</th>
                            <th>Контактное лицо</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><a href="{{ url('/user_cards/'. $user->id) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->reg_code }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                <a href="tel:{{ $user->phone }}">
                                    <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i> Позвонить </button>
                                </a>
                            </td>
                            <td> 
                                <a href="mailto:{{ $user->email }}">
                                    <button class="btn btn-success m-1"> <i class="fas fa-envelope"></i> Написать </button>
                                </a>
                            </td>
                            <td>
                                <a href="mailto:{{ $user->website }}">
                                    <button class="btn btn-success m-1"> <i class="fas fa-globe"></i> Перейти на сайт </button>
                                </a>
                            </td>
                            <td>{{ $user->contact_name }}</td>
                        @endforeach
                        </tr> 
                    </tbody>
                </table>
        </div>
    </div>
@stop

@section('scripts')

    
@stop