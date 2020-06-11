@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

    <div class="container-fluid">
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
                            <td>{{ $user->name }}</td>
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