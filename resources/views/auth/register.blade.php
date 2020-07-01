@extends('layouts.app')

@section('content')

<style>

.dropdown-menu{
    left: 6%;
    top: 96%;
    position:absolute !important;
}

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Регистрация</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="role" value="user">
                        <input type="hidden" name="status" value="unconfirmed">
                        <div class="form-group row required">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Название предприятия</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row required">
                            <label for="reg_code" class="col-md-4 col-form-label text-md-right">Код регистрации</label>

                            <div class="col-md-6">
                                <input id="reg_code" type="text" class="form-control " name="reg_code" value="" required autocomplete="reg_code">
                            </div>
                        </div>

                        <!-- <div class="form-group row required">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row required">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Повторите пароль</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> -->
                        <hr>
                        <!-- NEW -->



                        <div class="form-group row required">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Страна</label>

                            <div class="col-md-6">
                                <!-- <input id="country" type="text" class="form-control " name="country" value="" required autocomplete="country"> -->
                                <input type="text" name="country" id="country" class="form-control input-lg" placeholder="" />
                                <div id="countryList">
                                </div>
                                {{ csrf_field() }}
                            </div>
                        </div>
                        <div class="form-group row required">

                            <label for="city" class="col-md-4 col-form-label text-md-right">Город</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control " name="city" value="" required autocomplete="city">
                            </div>
                        </div>

                        <div class="form-group row required">

                            <label for="address" class="col-md-4 col-form-label text-md-right">Адрес</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control " name="address" value="" required autocomplete="address">
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Мобильный телефон (основной)</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control " name="phone" value="" autocomplete="phone">
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label for="messenger" class="col-md-4 col-form-label text-md-right">Мобильный телефон (мессенджер)</label>

                            <div class="col-md-6">
                                <input id="messenger" type="text" class="form-control " name="messenger" value="" autocomplete="messenger">
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">Сайт</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control " name="website" value="" autocomplete="website">
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label for="contact_name" class="col-md-4 col-form-label text-md-right">Контактное лицо</label>

                            <div class="col-md-6">
                                <input id="contact_name" type="text" class="form-control " name="contact_name" value="" required autocomplete="contact_name">
                            </div>
                        </div>

                        <div class="form-group row required">
                            <label for="activity" class="col-md-4 col-form-label text-md-right">Вид деятельности</label>

                            <select class="form-control col-md-6" name="activity">
                                <option value="Фермер">Фермер</option>
                                <option value="Трейдер">Трейдер</option>
                                <option value="Переработчик">Переработчик</option>
                                <option value="Агент">Агент</option>
                            </select>
                        </div>

                        <div class="form-group row required">
                            <label for="work_activity" class="col-md-4 col-form-label text-md-right">Краткое описание деятельности</label>

                            <div class="col-md-6">
                                <textarea id="work_activity" type="text" class="form-control " name="work_activity" value="" required autocomplete="work_activity"></textarea>
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">Логотип</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control " name="logo" value="" autocomplete="logo">
                            </div>
                        </div>
                        <hr>


                        <!-- END NEW -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Зарегистрироваться
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

 $('#country').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#countryList').fadeIn();  
                    $('#countryList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#country').val($(this).text());  
        $('#countryList').fadeOut(); 
    });  

});
</script>



@endsection
