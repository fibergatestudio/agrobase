@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')

<div class="container-fluid">
    <h1>AgroBase Tables</h1>
    <div class="row">
        <div class="col-md-6">
            Filter:
            <a href="tables/?area=Area">Area</a>
            <a href="tables/?region=reg">Test</a>
        </div>
        <div class="col-md-6 text-right">
            Sort:
            <a href="{{ route('tables.index', ['area' => request('area'), 'region' => request('region'), 'sort' => 'asc']) }}">ASC</a>
            <a href="{{ route('tables.index', ['area' => request('area'), 'region' => request('region'), 'sort' => 'desc']) }}">DESC</a>
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
                            <th>Стац. телефон</th>
                            <th>Моб. телефон</th>
                            <th>Доп. телефон</th>
                            <th>Номер Сельсовета</th>
                            <th>Зем. банк</th>
                            <th>ЕГРПОУ</th>
                            <th>Адрес</th>
                            <th>Имейл\Сайт</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($agro as $agr)
                        <tr>
                            <td>{{$agr->id}}</td>
                            <td>{{$agr->title}}</td>
                            <td>{{$agr->region}}</td>
                            <td>{{$agr->area}}</td>
                            <td>{{$agr->supervisor}}</td>
                            <td>{{$agr->landline_phone}}</td>
                            <td>{{$agr->mobile_phone}}</td>
                            <td>{{$agr->fax}}</td>
                            <td>{{$agr->concil_number}}</td>
                            <td>{{$agr->land_bank}}</td>
                            <td>{{$agr->egrpou}}</td>
                            <td>{{$agr->address}}</td>
                            <td>{{$agr->email_website}}</td>
                            <td><a href="tel:{{$agr->mobile_phone}}"><button class="btn btn-success">Позвонить</button></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            
                {{$agro}}
            </div>

</div>

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