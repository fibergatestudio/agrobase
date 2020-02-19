
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    
<div class="container">
    <h1>Edit user {{$user_info->name}}</h1>
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
            <div class="form-group">
                <label class="control-label col-sm-2" for="status">Статус</label>
                <div class="col-sm-10">          
                    <!-- <input type="password" class="form-control" id="status" placeholder="{{$user_info->status}}" name="status" disabled> -->
                    <select class="form-control" name="status">
                        <option value="confirmed" @if($user_info->status == 'confirmed') selected @endif>Подтвержден</option>
                        <option value="unconfirmed" @if($user_info->status == 'unconfirmed') selected @endif>Не подтвержден</option>
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
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Применить</button>
            </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('scripts')

@stop