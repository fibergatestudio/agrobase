
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')

@if(session()->has('message_delete'))
    <div class="alert alert-success">
        {{ session()->get('message_delete') }}
    </div>
@endif
            <div class="allcards-main">
                <div class="allcards-wrapper">
                    <h3 class="allcards-title">Все пользователи</h3>

                    <div class="allcards-scroll-container">
						<div class="allcards-scroll-inner">
							<div class="allcards-top">
								<div class="allcards-top_title">#</div>
								<div class="allcards-top_title">Лого</div>
								<div class="allcards-top_title">Имя</div>
								<div class="allcards-top_title">E-Mail</div>
								<div class="allcards-top_title">Пароль</div>
								<div class="allcards-top_title">Статус</div>
								<div class="allcards-top_title">Роль</div>
								<div class="allcards-top_title">Оплачен до:</div>
								<div class="allcards-top_title"></div>
								<!-- <div class="allcards-top_title"></div> -->

							</div>
                            @foreach($users as $user)
							<div class="allcards-string">                        
								<div class="allcards-string_inner">{{$user->id}}. </div>
								<div class="allcards-string_inner"> <a class="allcards-string_link"> <img src="{{$user->logo}}" width="76" height="76" alt=""></a> </div>
								<div class="allcards-string_inner">{{$user->name}}</div>
								<div class="allcards-string_inner">{{$user->email}}</div>
								<div class="allcards-string_inner">{{$user->password_unveil}}</div>
								<div class="allcards-string_inner"> 
                                @if($user->status == 'expired')
                                    {{$user->status}}
                                @elseif($user->status == 'unconfirmed')
                                        Не подтвержден
                                @else
                                        Подтвержден
                                @endif
                                </div>
								<div class="allcards-string_inner"> 
                                @if($user->role == 'admin')
                                    Админ
                                @elseif($user->role = 'user')
                                    Пользователь
                                @endif
                                </div>
								<div class="allcards-string_inner">                    
                                @if($user->expiry_date >= $date)
                                    {{$user->expiry_date}} 
                                @else
                                    Не оплачен
                                @endif
                                </div>
								<div class="allcards-string_inner">
								<div class="allcards-string_inner--block"><a class="allcards-string_edit" href="/admin/users/edit/{{$user->id}}">Редактировать</a></div>
								<div class="allcards-string_inner--block"><a class="allcards-string_delete" >Удалить</a></div>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
                </div>
            </div>


            <!-- cards-mobile-version -->
            <div class="allcards-mobile-main">
                <div class="allcards-mobile-wrapper">
                    <h3 class="allcards-mobile-title">Карточки пользователей</h3>
                    @foreach($users as $user)
                    <div class="allcards-mobile-string">
                        <div class="allmobile-string_left">
                            <div class="allmobile-left-inner"># {{$user->id}}</div>
                        </div> 
                        <div class="allmobile-string_center">
                            <div class="allmobile-center-inner">Лого</div>
                            <div class="allmobile-center-inner"><a class="allcards-string_link"> <img src="{{$user->logo}}" width="76" height="76" alt=""></a></div>
                            <div class="allmobile-center-inner">Имя</div>
                            <div class="allmobile-center-inner">Email</div>
                            <div class="allmobile-center-inner">Пароль</div>
                            <div class="allmobile-center-inner">Статус</div>
                            <div class="allmobile-center-inner">Роль</div>
                            <div class="allmobile-center-inner">Оплачен до:</div>
                        </div>
                        <div class="allmobile-string_right">
                            <div class="allmobile-right-inner">.</div>
                            <div class="allmobile-right-inner"></div>
                            <div class="allmobile-right-inner">{{$user->name}}</div>
                            <div class="allmobile-right-inner">{{$user->email}}</div>
                            <div class="allmobile-right-inner">{{$user->password_unveil}}</div>
                            <div class="allmobile-right-inner">
                                @if($user->status == 'expired')
                                    {{$user->status}}
                                @elseif($user->status == 'unconfirmed')
                                        Не подтвержден
                                @else
                                        Подтвержден
                                @endif
                            </div>
                            <div class="allmobile-right-inner">
                                @if($user->role == 'admin')
                                    Админ
                                @elseif($user->role = 'user')
                                    Пользователь
                                @endif
                            </div>
                            <div class="allmobile-right-inner">                               
                                @if($user->expiry_date >= $date)
                                    {{$user->expiry_date}} 
                                @else
                                    Не оплачен
                                @endif
                            </div>
                        </div>
                        <div class="allmobile-string_bottom">
                        <div class="allmobile-bottom-inner"><a class="allmobile-bottom_edit">Редактировать</a></div>
                        <div class="allmobile-bottom-inner"><a class="allmobile-bottom_delete">Удалить</a></div>
                        </div>
                    </div>
                    @endforeach
            
            </div>
            </div>



<div style="display:none;" class="container">
    <h1>Все пользователи</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Лого</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Пароль</th>
                <th>Статус</th>
                <th>Роль</th>
                <th>Оплачен до: </th>
                <th width="100px">Ред.</th>
                <th width="100px">Удалить</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><img src="{{$user->logo}}" width="125" height="125"></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password_unveil}}</td>
                @if($user->status == 'expired')
                    <td class="table-danger">
                        {{$user->status}}
                    </td>
                @elseif($user->status == 'unconfirmed')
                    <td class="table-warning">
                        Не подтвержден
                    </td>
                @else
                    <td class="table-success">
                        Подтвержден
                    </td>
                @endif
                <td>
                @if($user->role == 'admin')
                    Админ
                @elseif($user->role = 'user')
                    Пользователь
                @endif
                </td>
                <td>
                    @if($user->expiry_date >= $date)
                        {{$user->expiry_date}} 
                    @else
                        Не оплачен
                    @endif
                </td>
                <td><a href="/admin/users/edit/{{$user->id}}"><button class="btn btn-success">Редактировать</button></a></td>
                <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                Удалить
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Удаление польователя</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Вы уверенны что хотите удалить пользователя {{$user->name}}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <form action="/admin/users/delete/{{$user->id}}/apply" method="POST">
                            @csrf
                                <button type="submit" class="btn btn-primary">Удалить</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="row text-center">
        <div class="col-md-12 center-block pt-5">
            <a href="{{ url('/admin/users/add/') }}">
                <button class="btn btn-success">Добавить Пользователя</button>
            </a>
        </div>
    </div>
</div>

@stop

@section('scripts')

@stop