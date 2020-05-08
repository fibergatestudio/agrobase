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
    <h1> Харьков</h1>
    <a href="{{ url('/all_tables') }}"><button class="btn btn-success">Выбор Таблицы</button></a>
    <a href="{{ url('/import') }}"><button class="btn btn-success">Импортировать Харьков</button></a>
    <br>
    <div class="row">
        <div class="col-md-6 row p-2">
            <div class="col-md-6">
                @if(isset($regions))
                    Области:
                    <select name="region" class="form-control" onchange="location = this.value;">
                        <option value="/kharkiv">Выберите Область</option>
                    @foreach($regions as $region)
                        <option value="table/?region={{ $region->region }}" @if($f_region == $region->region) selected @endif>{{ $region->region }}</option>
                    @endforeach
                    </select>
                @endif
            </div>
            <div class="col-md-6">
                    @if(isset($areas))
                        Районы:
                        <select name="region" class="form-control" onchange="location = this.value;">
                            <option value="/kharkiv">Выберите Район</option>
                        @foreach($areas as $area)
                            <option @if($f_area == $area->area) value="tables/?area={{ $area->area }}" selected @else
                            value="tables/?region={{ $f_region }}&area={{ $area->area }}"
                             @endif>{{ $area->area }}</option>
                        @endforeach
                        </select>
                    @endif
            </div>
        </div>
            <div class="col-md-6 text-right">
                Сортировать по:<br>
                <a href="{{ route('tables.index_old', ['region' => request('region'), 'area' => request('area'),  'sort' => 'asc']) }}"><button class="btn btn-success"><i class="fas fa-sort-up"></i> Возрастанию</button></a>
                <a href="{{ route('tables.index_old', ['region' => request('region'), 'area' => request('area'),  'sort' => 'desc']) }}"><button class="btn btn-success"><i class="fas fa-sort-down"></i>Убыванию</button></a>
            </div>
        </div>
            <div id="home" class="tab-pane fade in active show">
                <table class="table table-bordered data-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Область</th>
                            <th>Район</th>
                            <th>Руководитель</th>
                            <!-- <th>Стац. телефон</th> -->
                            <th>Моб. телефон</th>
                            <th>Доп. телефон</th>
                            <!-- <th>Номер Сельсовета</th> -->
                            <th>Зем. банк</th>
                            <th>ЕГРПОУ</th>
                            <th>Адрес</th>
                            <th>Имейл\Сайт</th>
                            <!-- <th width="100px">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($agro as $agr)
                        <tr>
                            <?php $test = json_decode($agr->rows); ?>
                                <td>{{ $agr->id }}</td>
                            @foreach($test as $t)
                                <td>{{ $t }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            
                {{$agro}}
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