@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')


@if(isset($user))
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif

    @if($user->status == "confirmed")
    <div class="container-fluid">
    <h1> Таблица </h1>
    <a href="{{ url('/all_tables') }}"><button class="btn btn-success">Выбор Таблицы</button></a>
    <a href="{{ url('/import') }}"><button class="btn btn-success">Импортировать</button></a>
    <br>
        <div class="row">
            <div class="col-md-6 row p-2">
                <div class="col-md-6">
                    @if(isset($regions))
                        Области:
                        <select name="region" class="form-control" onchange="location = this.value;">
                        @foreach($regions as $region)
                            <!-- <option value="{{ $table_id }}/?oblast={{ $region->oblast }}" @if($f_region == $region->oblast) selected @endif>{{ $region->oblast }}</option> -->
                            <option value="{{ route('tables.index', ['table_id' => $table_id,'oblast' => $region->oblast]) }}" @if($f_region == $region->oblast) selected @endif>{{ $region->oblast }}</option>
                        @endforeach
                        </select>
                    @endif
                </div>
                <div class="col-md-6">
                        @if(isset($areas))
                            Районы:
                            <select name="area" class="form-control" onchange="location = this.value;">
                            @foreach($areas as $area)
                                <!-- <option @if($f_area == $area->rayon) value="{{ $table_id }}/?rayon={{ $area->rayon }}" selected @else
                                value="{{ $table_id }}/?rayon={{ $f_region }}&rayon={{ $area->rayon }}"
                                @endif>{{ $area->rayon }}</option> -->

                                <option @if($f_area == $area->rayon) value="{{ route('tables.index', ['table_id' => $table_id,'rayon' => $area->rayon]) }}" selected @else
                                value="{{ route('tables.index', ['table_id' => $table_id,'rayon' => $area->rayon]) }}"
                                @endif>{{ $area->rayon }}</option>

                                
                            @endforeach
                            </select>
                        @endif
                </div>
            </div>
            <div class="col-md-6 text-right">
                Сортировать по:<br>
                <a href="{{ route('tables.index', ['table_id' => $table_id,'oblast' => request('oblast'), 'rayon' => request('rayon'),  'sort' => 'asc']) }}"><button class="btn btn-success"><i class="fas fa-sort-up"></i> Возрастанию</button></a>
                <a href="{{ route('tables.index', ['table_id' => $table_id,'oblast' => request('oblast'), 'rayon' => request('rayon'),  'sort' => 'desc']) }}"><button class="btn btn-success"><i class="fas fa-sort-down"></i>Убыванию</button></a>
            </div>
            <div id="home" class="tab-pane fade in active show">
                <table id="table" class="table table-bordered data-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            @foreach($table_heads_text as $column)
                                <th>{{$column}}</th>
                            @endforeach

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($table_rows as $row)
                        <?php $phone_index = '1'; ?>
                            <tr>
                                @foreach($table_head_columns as $column)
                                <td>
                                
                                <?php if(preg_match("/\(?[2-9][0-8][0-9]\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}/", $row->$column)) { ?>
                                    <a href="tel:{{ $row->$column }}">
                                        <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i>      
                                            <?php 
                                            echo 'Телефон ' . $phone_index++; 
                                            ?>                                       
                                        </button>
                                    </a>
                                <?php } else { ?>
                                    {{ $row->$column }}
                                <?php } ?>
                                </td>

                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        
                {{ $table_rows->links() }}
            </div>
        </div>
    @elseif($user->status == "expired")
    <div class="container">
        <div class="alert alert-danger" role="alert">
            Подписка истекла!
        </div>
    </div>
    @else
    <div class="container">
        <div class="alert alert-danger" role="alert">
            Пользователь не подтвержден!
        </div>
    </div>
    @endif
@else
    <div class="container">
        <div class="alert alert-success" role="alert">
            Пожалуйста залогиньтесь!
        </div>
    </div>
@endif



@stop

@section('scripts')

<!-- <script type="text/javascript">
 $(function () {
   $("#table").DataTable({
      "language":{
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json",
      }
   });
 });
</script> -->

        @if(Auth::guest())
            <!-- Отключение вовзможности выделение текста -->
            <script type="text/javascript">
                (function($){
                    $.fn.disableSelection = function() {
                        return this
                                .attr('unselectable', 'on')
                                .css('user-select', 'none')
                                .on('selectstart', false);
                    };
                })(jQuery);
                
                $('body').disableSelection();
            </script>

            <!-- Отключение вовзможности нажатия ПКМ -->
            <script type="text/javascript">

            $(document).ready(function(){
                $(document).on("contextmenu",function(e){
                    if(e.target.nodeName != "INPUT" && e.target.nodeName != "TEXTAREA")
                        e.preventDefault();
                });
            });
            
            </script>
        @elseif (Auth::user()->role  == 'admin')
        @endif
    
@stop