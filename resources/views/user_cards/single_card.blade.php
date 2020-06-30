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
        <h1>Карточка организации {{ $user->name }}</h1>
                <div class="blog-post">

                        <div class="form-group row">
                            <label for="short_text" class="col-md-4 col-form-label text-md-right">Логотип</label>

                            <div class="col-md-6">
                                @if(isset($user->logo))
                                <img src="{{ $user->logo }}" width="125" height="125">
                                @else
                                    Нет логотипа
                                @endif
                            </div>
                        </div>

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

                            <a style="padding-left: 10px;" href="tel:{{ $user->phone }}">
                                <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i>      
                                    Позвонить                                     
                                </button>
                            </a>
                           
                        </div>
                        <div class="form-group row">
                        <label for="sale_place" class="col-md-4 col-form-label text-md-right">Мессенджер</label>
                            <a style="padding-left: 10px;" href="tel:{{ $user->messenger }}">
                                <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i>      
                                    Позвонить                                     
                                </button>
                            </a>
                        </div>
                        <div class="form-group row">
                            <label for="sale_type" class="col-md-4 col-form-label text-md-right">Email</label>

                            <!-- <div class="col-md-6">
                                <input id="sale_type" type="text" class="form-control" placeholder="{{ $user->email }}" disabled>
                            </div> -->

                            <a style="padding-left: 10px;" href="mailto:{{ $user->email }}">
                                <button class="btn btn-success m-1"> <i class="fas fa-envelope"></i>      
                                    Email
                                </button>
                            </a>

                            <input type="hidden" id="copy_{{ $user->id }}" value="{{ $user->email }}">
                            <button class="btn btn-success m-1" onclick="copyToClipboard('#copy_{{ $user->id }}')">
                                <i class="fa fa-clone" aria-hidden="true"></i>
                                Копировать
                            </button> 
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Сайт</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="{{ $user->website }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Контактное лицо</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="{{ $user->contact_name }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label text-md-right">Страна</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="{{ $user->country }}" disabled>
                            </div>
                            <label for="price" class="col-md-2 col-form-label text-md-right">Город</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="{{ $user->city }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label text-md-right">Вид деятельности</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="{{ $user->activity }}" disabled>
                            </div>

                            <label for="price" class="col-md-2 col-form-label text-md-right">Краткое описание деятельности</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="{{ $user->work_activity }}" disabled>
                            </div>
                        </div>
                        <!-- END NEW -->

                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')

<script>
function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(
        $(element).val()
        ).select();
    document.execCommand("copy");
    $temp.remove();
}

</script>
    
@stop