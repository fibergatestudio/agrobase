@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')

@if(session()->has('message_delete'))
    <div class="alert alert-success">
        {{ session()->get('message_delete') }}
    </div>
@endif
<div class="container">
    <h1>Все таблицы</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Название в базе</th>
                <!-- <th width="100px">Ред.</th> -->
                <th width="100px">Удалить</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tables as $table)
            <tr>
                <td>{{$table->id}}</td>
                <td>{{$table->table_name}}</td>
                <td>{{$table->database_table_name}}</td>
                
                <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$table->id}}">
                Удалить
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$table->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Удаление таблицы</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Вы уверенны что хотите удалить таблицу {{$table->table_name}}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <form action="/admin/tables_control/delete/{{$table->id}}/apply" method="POST">
                            @csrf
                                <button type="submit" class="btn btn-primary">Удалить</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="row text-center">
        <div class="col-md-6 center-block pt-5">
            <a href="{{ url('/import') }}">
                <button class="btn btn-success">Импорт Таблицы</button>
            </a>
        </div>
        <div class="col-md-6 center-block pt-5">
            <a href="{{ url('/import_international') }}">
                <button class="btn btn-success">Импорт Международн. Таблицы</button>
            </a>
        </div>
    </div>
</div>



@stop

@section('scripts')
    
@stop