@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')


@if(isset($user))
    @if($user->status == "confirmed")
    <div class="container-fluid">
    <h1>AgroBase Tables</h1>
    <div class="row">
        <div class="col-md-6 row p-2">
            <div class="col-md-6">
                @if(isset($regions))
                    Области:
                    <select name="region" class="form-control" onchange="location = this.value;">
                        <option>Выберите Область</option>
                    @foreach($regions as $region)
                        <option value="tables/?region={{ $region->region }}">{{ $region->region }}</option>
                    @endforeach
                    </select>
                @endif
            </div>
            <div class="col-md-6">
                    @if(isset($areas))
                        Районы:
                        <select name="region" class="form-control" onchange="location = this.value;">
                            <option>Выберите Район</option>
                        @foreach($areas as $area)
                            <option value="tables/?area={{ $area->area }}">{{ $area->area }}</option>
                        @endforeach
                        </select>
                    @endif
            </div>
            </div>
            <div class="col-md-6 text-right">
                Сортировать по:<br>
                <a href="{{ route('tables.index', ['area' => request('area'), 'region' => request('region'), 'sort' => 'asc']) }}"><button class="btn btn-success">Возрастанию</button></a>
                <a href="{{ route('tables.index', ['area' => request('area'), 'region' => request('region'), 'sort' => 'desc']) }}"><button class="btn btn-success">Убыванию</button></a>
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