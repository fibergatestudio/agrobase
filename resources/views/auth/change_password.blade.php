@extends('layouts.app')

@section('content')




            <div class="passpage_main">
            <form id="form-change-password" role="form" method="POST" action="{{ url('/change_password/apply') }}" novalidate class="form-horizontal">
                <div class="passpage_wrapper">
                    <h3 class="passpage_title">Изменение Пароля</h3>
                   <div class="passpage_inner">
                    <div class="passpage_inner-string">
                        <label class="string--label">Текущий пароль</label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <input type="password" class="string--password" id="current-password" name="current-password" placeholder="Текущий пароль">
                    </div>
                    <div class="passpage_inner-string">
                        <label class="string--label">Новый пароль</label>
                        <!-- <input class="string--password" type="password" placeholder="123456789"> -->
                        <input type="password" class="string--password" id="password" name="password" placeholder="Новый пароль">
                    </div>
                    <div class="passpage_inner-string">
                        <label class="string--label">Подтвердите новый пароль</label>
                        <!-- <input class="string--password" type="password" placeholder="123456789"> -->
                        <input type="password" class="string--password" id="password_confirmation" name="password_confirmation" placeholder="Повторите новый пароль">
                    </div>
                   </div>                   
                </div>
                 <button class="tables-btn" >Изменить</button>
            </form>
            </div>


<div style="display:none;" class="container">
    <div class="row justify-content-center">
       @if($message = Session::get('message'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif
        @if($message = Session::get('message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Изменение Пароля') }}</div>

                <div class="card-body">
                <form id="form-change-password" role="form" method="POST" action="{{ url('/change_password/apply') }}" novalidate class="form-horizontal">
                    <div class="col-md-12">             
                        <label for="current-password" class="col-sm-4 control-label">Текущий пароль</label>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Текущий пароль">
                        </div>
                        </div>
                        <label for="password" class="col-sm-4 control-label">Новый пароль</label>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Новый пароль">
                        </div>
                        </div>
                        <label for="password_confirmation" class="col-sm-4 control-label">Повторите новый пароль</label>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Повторите новый пароль">
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-6">
                        <button type="submit" class="btn btn-danger">Изменить</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
