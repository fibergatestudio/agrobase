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
                <h2 class="blog-post-title"> Обьявление № {{ $advert_id }}</h2>
                <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

                <p>{{ $advert_info->short_text }}</p>
                <hr>
                <p><b>Предприятие:</b> {{ $advert_info->company }}</p>
                <p><b>Предмет торговли:</b> {{ $advert_info->trading_item }}</p>
                <p><b>Место продажи:</b> {{ $advert_info->sale_place }}</p>
                <p><b>Вид продажи:</b> {{ $advert_info->sale_type }}</p>
                <p><b>Цена:</b> {{ $advert_info->price }}</p>
                <!-- <blockquote>
                <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </blockquote>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p> -->
            
            </div><!-- /.blog-post -->

            </div><!-- /.blog-main -->
        </div>
    </div>
</div>
@stop

@section('scripts')

    
@stop