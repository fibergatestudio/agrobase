
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')

@if(session()->has('message_delete'))
    <div class="alert alert-danger">
        {{ session()->get('message_delete') }}
    </div>
@endif
@if(session()->has('message_success'))
    <div class="alert alert-success">
        {{ session()->get('message_success') }}
    </div>
@endif


            <div class="alldeclaration-main">
                <div class="alldeclaration-wrapper">
                    <h3 class="alldeclaration-title">Все объявления</h3>
                    <div class="alldeclaration-scroll-container">
                        <div class="alldeclaration-scroll-inner">
                            <div class="alldeclaration-top">
                                <div class="alldeclaration-top_title">#</div>
                                <div class="alldeclaration-top_title">Предприятие</div>
                                <div class="alldeclaration-top_title">Предмет торговли</div>
                                <div class="alldeclaration-top_title">Место продажи</div>
                                <div class="alldeclaration-top_title">Вид продажи</div>
                                <div class="alldeclaration-top_title">Цена</div>
                                <div class="alldeclaration-top_title">Статус</div>
                                <div class="alldeclaration-top_title">Действия</div>
                            </div>
                            @foreach($adverts as $advert)
                            <div class="alldeclaration-string">
                                <div class="alldeclaration-string_inner">{{$advert->trading_item}}.</div>
                                <div class="alldeclaration-string_inner"> <span> {{$advert->company}}</span></div>
                                <div class="alldeclaration-string_inner">{{$advert->trading_item}}</div>
                                <div class="alldeclaration-string_inner">{{$advert->sale_place}}</div>
                                <div class="alldeclaration-string_inner">{{$advert->sale_type}}</div>
                                <div class="alldeclaration-string_inner">{{$advert->price}}</div>
                                <div class="alldeclaration-string_inner">
                                @if($advert->status == 'unconfirmed')
                                    Не подтвержден
                                @else
                                    Подтвержден
                                @endif
                                </div>
                                <div class="alldeclaration-string_inner">
                                    <div class="alldeclaration-string_inner--block"><a
                                            class="alldeclaration-string_confirm" href="##">Подтвердить</a></div>
                                    <div class="alldeclaration-string_inner--block"><a
                                            class="alldeclaration-string_delete" href="##">Удалить</a></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- alldeclaration-mobile-version -->
            <div class="alldeclaration-mobile-main">
                <div class="alldeclaration-mobile-wrapper">
                    <h3 class="alldeclaration-mobile-title">Все объявления</h3>
                    @foreach($adverts as $advert)
                    <div class="alldeclaration-mobile-string">
                        <div class="alldeclaration-string_center">
                            <div class="alldeclaration-center-inner">#</div>
                            <div class="alldeclaration-center-inner">Предприятие</div>
                            <div class="alldeclaration-center-inner">Предмет торговли</div>
                            <div class="alldeclaration-center-inner">Место продажи</div>
                            <div class="alldeclaration-center-inner">Вид продажи</div>
                            <div class="alldeclaration-center-inner">Цена</div>
                            <div class="alldeclaration-center-inner">Статус</div>
                        </div>
                        <div class="alldeclaration-string_right">
                            <div class="alldeclaration-string_inner">{{$advert->trading_item}}.</div>
                            <div class="alldeclaration-string_inner"> <span> {{$advert->company}}</span></div>
                            <div class="alldeclaration-string_inner">{{$advert->trading_item}}</div>
                            <div class="alldeclaration-string_inner">{{$advert->sale_place}}</div>
                            <div class="alldeclaration-string_inner">{{$advert->sale_type}}</div>
                            <div class="alldeclaration-string_inner">{{$advert->price}}</div>
                            <div class="alldeclaration-string_inner">
                            @if($advert->status == 'unconfirmed')
                                Не подтвержден
                            @else
                                Подтвержден
                            @endif
                            </div>
                        </div>
                        <div class="alldeclaration-string_bottom">
                            <div class="alldeclaration-bottom-inner">Действия</div>
                            <div class="alldeclaration-bottom-inner"><a href="{{ url('/admin/adverts_control/'. $advert->id .'/apply') }}" class="alldeclaration-bottom_confirm">Подтвердить</a></div>
                            <div class="alldeclaration-bottom-inner"><a href="{{ url('/admin/adverts_control/'. $advert->id .'/delete') }}" class="alldeclaration-bottom_delete">Удалить</a></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>





<div style="display:none;" class="container">
    <h1>Все обьявления</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>#</th>
                <th></th>
                <th>Предприятие</th>
                <th>Предмет торговли</th>
                <th>Место продажи</th>
                <th>Вид продажи</th>
                <th>Цена</th>
                <th>Статус</th>
                <th>Действия</th>

            </tr>
        </thead>
        <tbody>
        @foreach($adverts as $advert)
            <tr>
                <td>{{$advert->id}}</td>

                <td>
                <?php $photos = explode("|",$advert->prod_photo); ?>
                <?php foreach($photos as $photo) { ?>
                    <img src="{{ $photo }}"  width="125" height="125">
                <?php } ?>

                </td>

                <td>{{$advert->company}}</td>
                <td>{{$advert->trading_item}}</td>
                <td>{{$advert->sale_place}}</td>
                <td>{{$advert->sale_type}}</td>
                <td>{{$advert->price}}</td>
                @if($advert->status == 'unconfirmed')
                    <td class="table-warning">
                        Не подтвержден
                    </td>
                @else
                    <td class="table-success">
                        Подтвержден
                    </td>
                @endif
                <td>
                    <a href="{{ url('/admin/adverts_control/'. $advert->id .'/apply') }}"><button class="btn btn-success">Подтвердить</button></a>
                    <a href="{{ url('/admin/adverts_control/'. $advert->id .'/delete') }}"><button class="btn btn-danger">Удалить</button></a>
                </td>
                <!-- <td><a href="/admin/users/edit/"><button class="btn btn-success">Редактировать</button></a></td>
                <!-- <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Удалить
                </button>

                <div class="modal fade" id="exampleModal{" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Удаление польователя</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Вы уверенны что хотите удалить пользователя ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <form action="/admin/users/delete//apply" method="POST">
                            @csrf
                                <button type="submit" class="btn btn-primary">Удалить</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                </td> -->
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@stop

@section('scripts')

@stop