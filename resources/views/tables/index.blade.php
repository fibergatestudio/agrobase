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
    <h1> AgroBase Tables</h1>
    <div class="row">
        <div class="col-md-6 row p-2">
            <div class="col-md-6">
                @if(isset($regions))
                    Области:
                    <select name="region" class="form-control" onchange="location = this.value;">
                        <option value="/tables">Выберите Область</option>
                    @foreach($regions as $region)
                        <option value="tables/?region={{ $region->region }}" @if($f_region == $region->region) selected @endif>{{ $region->region }}</option>
                    @endforeach
                    </select>
                @endif
            </div>
            <div class="col-md-6">
                    @if(isset($areas))
                        Районы:
                        <select name="region" class="form-control" onchange="location = this.value;">
                            <option value="/tables">Выберите Район</option>
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
                <a href="{{ route('tables.index', ['region' => request('region'), 'area' => request('area'),  'sort' => 'asc']) }}"><button class="btn btn-success"><i class="fas fa-sort-up"></i> Возрастанию</button></a>
                <a href="{{ route('tables.index', ['region' => request('region'), 'area' => request('area'),  'sort' => 'desc']) }}"><button class="btn btn-success"><i class="fas fa-sort-down"></i>Убыванию</button></a>
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
                            <!-- <th width="100px">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($agro as $agr)
                        <?php $test = '1'; ?>
                        <tr>
                            <td>{{$agr->id}}</td>
                            <td>{{$agr->title}}</td>
                            <td>{{$agr->region}}</td>
                            <td>{{$agr->area}}</td>
                            <td>{{$agr->supervisor}}</td>
                                <td>                            
                                    @foreach($agr->landline_phone as $land_phone)
                                    <a href="tel:+38{{$land_phone}}">
                                        <button class="btn btn-success m-1"><i class="fas fa-phone-alt"></i> 
                                            <?php 
                                                $land_phone_full = '+38' . $land_phone;
                                                echo 'Телефон ' . $test++; 
                                            ?>       
                                                                   
                                        </button>
                                    </a>
                                    @endforeach
                                </td>
                            <td>
                                @foreach($agr->mobile_phone as $mob)
                                    <a href="tel:+38{{$mob}}">
                                        <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i> 
                                        <?php 
                                        $check = "+38";
                                        $m_phone = $mob;
                                        if(strpos($m_phone, $check) !== false){
                                            echo 'Телефон ' . $test++; ;
                                        } else {
                                            $number_of_symbols = strlen($mob);
                                            if($number_of_symbols > '7'){
                                                echo 'Телефон ' . $test++; 
                                            }
                                        }
                                        ?>
                                       
                                        </button>
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($agr->fax as $fax)
                                    <a href="tel:+38{{$fax}}">
                                        <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i> 
                                            <?php 
                                            echo 'Телефон ' . $test++; 
                                            ?>
                                            
                                        </button>
                                    </a>
                                @endforeach
                            </td>
                            <td>{{$agr->concil_number}}</td>
                            <td>{{$agr->land_bank}}</td>
                            <td>{{$agr->egrpou}}</td>
                            <td>{{$agr->address}}</td>
                            <td>{{$agr->email_website}}</td>
                            <!-- <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{$agr->id}}">
                            Позвонить
                            </button></td> -->
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