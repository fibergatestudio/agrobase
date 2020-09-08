@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')

<div class="import_main">
    <form method="post" enctype="multipart/form-data" action="{{ url('/import_international/import_excel') }}">
    @csrf
        <div class="import_wrapper">
            <h3 class="import_title">Импорт Международный</h3>
            <div class="import_inner">
                <div class="import_inner-string">
                    <a class="import_inner-btn back-btn" href="{{ url('/all_tables') }}">
                        <span>Назад</span>
                    </a>
                </div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                    Upload Validation Error<br><br>
                    <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                @endif

                @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
                @endif

                <div class="import_inner-string">
                    <div class="import_inner-string--title">Выберите файл для импорта</div>
                    <div class="import_inner-btn--wrapper">
                        <a class="import_inner-btn choose-btn" href="##">
                            <span>Выбрать файл</span>
                            <input class="input-btn" type="file">
                        </a>
                    </div>

                </div>

            </div>
        </div>
        <button type="submit" class="tables-btn import-btn">Загрузить</button>
    </form>
</div>

<div style="display:none;" class="container">
   <h3 align="center">Импорт Международный</h3>
   <a href="{{ url('/all_tables') }}"><button class="btn btn-success">Назад</button></a>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('/import_international/import_excel') }}">
    @csrf
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Выберите файл для импорта</label></td>
       <td width="30">
        <input type="file" name="select_file" />
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="Загрузить">
       </td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">.xls</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>
   </form>

   </div>

@stop