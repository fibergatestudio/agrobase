
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    
<div class="container">
    <h1>All Users</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Статус</th>
                <th>Роль</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->status}}</td>
                <td>{{$user->role}}</td>
                <td><a href="tel:{{$user->id}}"><button class="btn btn-warning">Редактировать</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@stop

@section('scripts')

@stop