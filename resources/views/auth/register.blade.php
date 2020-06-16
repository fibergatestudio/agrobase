@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Регистрация</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="role" value="user">
                        <input type="hidden" name="status" value="unconfirmed">
                        <div class="form-group row required">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Наименование</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row required">
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
                        </div>

                        <!-- NEW -->
                        <div class="form-group row required">
                            <label for="reg_code" class="col-md-4 col-form-label text-md-right">Регистрационный код</label>

                            <div class="col-md-6">
                                <input id="reg_code" type="text" class="form-control @error('email') is-invalid @enderror" name="reg_code" value="" required autocomplete="reg_code">
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Адрес</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('email') is-invalid @enderror" name="address" value="" required autocomplete="address">
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('email') is-invalid @enderror" name="phone" value="" required autocomplete="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">Сайт</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('email') is-invalid @enderror" name="website" value="" autocomplete="website">
                            </div>
                        </div>
                        <div class="form-group row required">
                            <label for="contact_name" class="col-md-4 col-form-label text-md-right">Контактное лицо</label>

                            <div class="col-md-6">
                                <input id="contact_name" type="text" class="form-control @error('email') is-invalid @enderror" name="contact_name" value="" required autocomplete="contact_name">
                            </div>
                        </div>
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
@endsection
