
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    
<div class="container">
    <h1>Редактирование пользователя: {{$user_info->name}}</h1>
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            {{ session()->get('message_success') }}
        </div>
    @endif
    <div class="container">
        <form class="form-horizontal" action="{{ url('/admin/users/edit/'. $user_info->id .'/apply') }}"  method="POST">
        @csrf
            <input type="hidden" name="user_id" value="{{$user_info->id}}">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Имя</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="name" placeholder="{{$user_info->name}}" name="name" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email</label>
                <div class="col-sm-10">          
                    <input type="password" class="form-control" id="email" placeholder="{{$user_info->email}}" name="email" disabled>
                </div>
            </div>
            <!-- -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="reg_code">Регистрационный код</label>
                <div class="col-sm-10">          
                    <input type="reg_code" class="form-control" id="reg_code" placeholder="{{$user_info->reg_code}}"  name="reg_code" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="address">Адрес</label>
                <div class="col-sm-10">          
                    <input type="address" class="form-control" id="address" placeholder="{{$user_info->address}}"  name="address" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="phone">Телефон</label>
                <div class="col-sm-10">          
                    <input type="phone" class="form-control" id="phone" placeholder="{{$user_info->phone}}" name="phone" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="website">Сайт</label>
                <div class="col-sm-10">          
                    <input type="website" class="form-control" id="website" placeholder="{{$user_info->website}}" name="website" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="contact_name">Контактное лицо</label>
                <div class="col-sm-10">          
                    <input type="contact_name" class="form-control" id="contact_name" placeholder="{{$user_info->contact_name}}" name="contact_name" >
                </div>
            </div>
            <!-- -->
            <hr>
            <div class="form-group">
                <label class="control-label col-sm-2" for="status">Статус</label>
                <div class="col-sm-10">          
                    <!-- <input type="password" class="form-control" id="status" placeholder="{{$user_info->status}}" name="status" disabled> -->
                    <select class="form-control" name="status">
                        <option value="confirmed" @if($user_info->status == 'confirmed') selected @endif>Подтвержден</option>
                        <option value="unconfirmed" @if($user_info->status == 'unconfirmed') selected @endif>Не подтвержден</option>
                        <option value="unconfirmed" @if($user_info->status == 'expired') selected @endif>Истекший</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="role">Роль</label>
                <div class="col-sm-10">          
                    <!-- <input type="password" class="form-control" id="role" placeholder="{{$user_info->role}}" name="role" disabled> -->
                    <select class="form-control" name="role">
                        <option value="admin" @if($user_info->role == 'admin') selected @endif>Админ</option>
                        <option value="user" @if($user_info->role == 'user') selected @endif>Пользователь</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="role">Действителен До</label>

                @if(isset($user_info->expiry_date))
                    <div class="col-sm-10">   
                        <input type="text" class="form-control"  placeholder="{{ $user_info->expiry_date }}" disabled>
                    </div>
                @else
                    <div class="col-sm-10">   
                        <input type="text" class="form-control"  placeholder="NULL" disabled>
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="role">Изменить дату</label>

                <div class="col-sm-10">   
                    <input class="form-control datepicker" id="datetimepicker1" placeholder="Выберите дату" name="expiry_date" type="text">
                </div>
            </div>
            <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Применить</button>
            </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('scripts')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datetimepicker1" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@stop