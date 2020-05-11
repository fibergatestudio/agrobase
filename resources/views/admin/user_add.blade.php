
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    
<div class="container">
    <h1>Добавление пользователя</h1>
    <!-- @if(session()->has('message_success'))
        <div class="alert alert-success">
            {{ session()->get('message_success') }}
        </div>
    @endif -->
    <div class="container">
        <form class="form-horizontal" action="{{ url('/admin/users/add/apply') }}"  method="POST">
        @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Имя</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Введите имя" name="name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Пароль</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="password" placeholder="Введите пароль" name="password">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email</label>
                <div class="col-sm-10">          
                    <input type="email" class="form-control" id="email" placeholder="Введите email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="role">Роль</label>
                <div class="col-sm-10">          
                    <select class="form-control" name="role" required>
                        <option>Выберите роль</option>
                        <option value="admin">Админ</option>
                        <option value="user">Пользователь</option>
                    </select>
                </div>
            </div>
            <!-- <div class="form-group">
                <label class="control-label col-sm-2" for="role">Действителен До</label>

                <div class="col-sm-10">   
                    <input class="form-control datepicker" id="datetimepicker1" placeholder="Выберите дату" name="expiry_date" type="text">
                </div>
            </div> -->
            <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Добавить</button>
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