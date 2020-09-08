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

                <div class="alltables-main">
                <div class="alltables-wrapper">
                    <h3 class="alltables-title">Все таблицы</h3>
                    <div class="alltables-top">
                        <div class="alltables-top_title">#</div>
                        <div class="alltables-top_title">название</div>
                        <div class="alltables-top_title">название в базе</div>
                        <div class="alltables-top_title">удалить</div>
                    </div>
                    @foreach($tables as $table)
                    <div class="alltables-string">
                        <div class="alltables-string_inner">{{$table->id}}.</div>
                        <div class="alltables-string_inner">{{$table->table_name}}</div>
                        <div class="alltables-string_inner">{{$table->database_table_name}}</div>
                        <div class="alltables-string_inner"><a class="alltables-string_delete" data-toggle="modal" style="color:white;" data-target="#exampleModal{{$table->id}}">Удалить</a></div>
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
                    </div>
                    @endforeach
                </div>

                <!-- <div class="alltables-pagination">
                    <div class="alltables-pagination_wrapper">
                        <div class="alltables-pagination_inner"><a class="alltables-pagination_back"
                                href="##">Назад</a></div>
                        <div class="alltables-pagination_inner active"><a href="##">1</a></div>
                        <div class="alltables-pagination_inner"><a href="##">2</a></div>
                        <div class="alltables-pagination_inner"><a href="##">3</a></div>
                        <div class="alltables-pagination_inner"><a href="##">...</a></div>
                        <div class="alltables-pagination_inner"><a href="##">25</a></div>
                        <div class="alltables-pagination_inner"><a class=" alltables-pagination_forward"
                                href="##">Далее</a></div>
                    </div>
                </div> -->


                <div class="alltables-btn-wrapper">
                    <a href="{{ url('/import') }}"><button class="tables-btn alltables-btn">Импорт таблицы</button></a>
                    <a href="{{ url('/import_international') }}"><button class="tables-btn alltables-btn">Импорт международной таблицы</button></a>
                </div>
            </div>
        
            <!-- alltables-mobile-version -->
            <div class="alltables-mobile-main">
                <div class="alltables-mobile-wrapper">
                    <h3 class="alltables-mobile-title">Все таблицы</h3>
                    @foreach($tables as $table)
                    <div class="alltables-mobile-string">
                        <div class="alltables-string_left">
                            <div class="alltables-left-inner">#</div>
                            <div class="alltables-left-inner">Название</div>
                            <div class="alltables-left-inner">Название в базе</div>
                            <div class="alltables-left-inner">Удалить</div>
                        </div>
                        <div class="alltables-string_right">
                            <div class="alltables-right-inner">{{$table->id}}.</div>
                            <div class="alltables-right-inner">{{$table->table_name}}</div>
                            <div class="alltables-right-inner">{{$table->database_table_name}}</div>
                            <div class="alltables-right-inner"><a class="alltables-mobile_delete" style="color:white;" data-target="#exampleModal{{$table->id}}">Удалить</a></div>
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
                        </div>                        
                    </div>
                    @endforeach
                </div>

                <!-- <div class="alltables-pagination">
                    <div class="alltables-pagination_wrapper">
                        <div class="alltables-pagination_inner"><a class="alltables-pagination_back"
                                href="##">Назад</a></div>
                        <div class="alltables-pagination_inner active"><a href="##">1</a></div>
                        <div class="alltables-pagination_inner"><a href="##">2</a></div>
                        <div class="alltables-pagination_inner"><a href="##">3</a></div>
                        <div class="alltables-pagination_inner"><a href="##">...</a></div>
                        <div class="alltables-pagination_inner"><a href="##">25</a></div>
                        <div class="alltables-pagination_inner"><a class=" alltables-pagination_forward"
                                href="##">Далее</a></div>
                    </div>
                </div> -->

                <a href="{{ url('/import') }}"><button class="tables-btn alltables-btn">Импорт таблицы</button></a>
                <a href="{{ url('/import_international') }}"><button class="tables-btn alltables-btn">Импорт международной таблицы</button></a>
        </div>


<div style="display:none;" class="container">
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