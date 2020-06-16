@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

    <div class="container">
        <div class="row">
        <div class="col-sm-12 blog-main">
        <h1>Карточка пользователя {{ $user->name }}</h1>
                <div class="blog-post">
                        <div class="form-group row">
                            <label for="short_text" class="col-md-4 col-form-label text-md-right">Имя</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" placeholder="{{ $user->name }}" disabled>
                            </div>
                        </div>

                        <!-- NEW -->
                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">Регистрационный код</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" placeholder="{{ $user->reg_code }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="trading_item" class="col-md-4 col-form-label text-md-right">Адрес</label>

                            <div class="col-md-6">
                                <input id="trading_item" type="text" class="form-control" placeholder="{{ $user->address }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sale_place" class="col-md-4 col-form-label text-md-right">Телефон</label>

                            <div class="col-md-6">
                                <input id="sale_place" type="text" class="form-control" placeholder="{{ $user->phone }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sale_type" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="sale_type" type="text" class="form-control" placeholder="{{ $user->email }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Сайт</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" placeholder="{{ $user->website }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Контактное лицо</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" placeholder="{{ $user->contact_name }}" disabled>
                            </div>
                        </div>
                        <!-- END NEW -->

                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')

    
@stop