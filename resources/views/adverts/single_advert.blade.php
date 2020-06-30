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
                <p class="blog-post-meta">{{ $beatiful_date }}</p>

                <p>{{ $advert_info->short_text }}</p>
                <hr>
                <p><b>Предприятие:</b> <a href="{{ url('/user_cards/'. $advert_info->creator_id) }}">{{ $advert_info->company }}</a></p>

                @if( $advert_info->action == 'Купить')
                    <div class="alert alert-primary">Покупка</div>
                @else
                    <div class="alert alert-success">Продажа</div>
                @endif
                <p><b>Товар:</b> {{ $advert_info->prod }}</p>
                <p><b>Место поставки:</b> {{ $advert_info->sale_place }}</p>
                <p><b>Вид продажи:</b> {{ $advert_info->sale_type }}</p>
                <p><b>Количество:</b> {{ $advert_info->amount }} {{ $advert_info->weight }}</p>
                <p><b>Цена:</b> {{ $advert_info->price }}</p>
                <p><b>Валюта:</b> {{ $advert_info->currency }} </p>
                <p><b>Вид поставки:</b> {{ $advert_info->delivery }} </p>
                <p><b>Описание товара:</b> {{ $advert_info->prod_descr }} </p>
                <p><b>Фото</b>     

                <?php $photos = explode("|",$advert_info->prod_photo); ?>
                <?php foreach($photos as $photo) { ?>
                    <img src="{{ $photo }}"  width="125" height="125">
                <?php } ?>

                </p>
                <p><b></b>  </p>
                <p><b></b>  </p>
                <p><b></b>  </p>
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