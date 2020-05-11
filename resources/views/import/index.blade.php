@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')

<div class="container">
   <h3 align="center">Импорт</h3>
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
   <form method="post" enctype="multipart/form-data" action="{{ url('/import/import_excel') }}">
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