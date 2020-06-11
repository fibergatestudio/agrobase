@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 blog-main">
                <div class="blog-post">
                <h2 class="blog-post-title">Добавить Обьявление</h2>
                    <form method="POST" action="{{ url('/advert/create/apply') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="short_text" class="col-md-4 col-form-label text-md-right">Краткий текст</label>

                            <div class="col-md-6">
                                <textarea id="short_text" class="form-control" name="short_text" placeholder="Краткий текст" required></textarea>
                            </div>
                        </div>

                        <!-- NEW -->
                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">Предприятие</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" name="company" value="" placeholder="Предприятие" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="trading_item" class="col-md-4 col-form-label text-md-right">Предмет торговли</label>

                            <div class="col-md-6">
                                <input id="trading_item" type="text" class="form-control" name="trading_item" value="" placeholder="Предмет торговли (прим. пшеница, масло, мука и тд);" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sale_place" class="col-md-4 col-form-label text-md-right">Место продажи</label>

                            <div class="col-md-6">
                                <input id="sale_place" type="text" class="form-control" name="sale_place" value="" placeholder="Место продажи" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sale_type" class="col-md-4 col-form-label text-md-right">Вид продажи</label>

                            <div class="col-md-6">
                                <input id="sale_type" type="text" class="form-control" name="sale_type" value="" placeholder="Вид продажи" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Цена</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="" placeholder="Цена" required>
                            </div>
                        </div>
                        <!-- END NEW -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Добавить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')

    
@stop