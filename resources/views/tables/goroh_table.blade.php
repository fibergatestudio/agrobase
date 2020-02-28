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
    <h1> Goroh Table</h1>
    <a href="{{ url('/all_tables') }}"><button class="btn btn-success">Выбор Таблицы</button></a>
    <br>
    <div class="row">
        </div>
            <div id="home" class="tab-pane fade in active show">
                <table class="table table-bordered data-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>ЄДРПОУ ВІДПР.</th>
                            <th>ВІДПРАВНИК</th>
                            <th>АДРЕСА ВІДПР.</th>
                            <th>ОДЕРЖУВАЧ</th>

                            <th>АДРЕСА ОДЕРЖУВ.</th>
                            <th>КОНТРАКТОДЕРЖАТЕЛЬ</th>

                            <th>АДРЕС КОНТАК-ТЕЛЯ</th>
                            <th>ЄДРПОУ ДЕКЛАРАНТА</th>
                            <th>УКТЗЕД</th>
                            <th>ОПИСь ТОВАРУ</th>
                            <th>КРАЇНА</th>
                            <th>КРАЇНА ьПРИЗНАЧЕННЯ</th>
                            <th>КОД_ПОСТАВКИ</th>

                            <th>МІСЦЕ ПОСТАВКИ</th>
                            <th>РФВ USD/1кг</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($goroh as $goroh)
                        <?php $test = '1'; ?>
                        <tr>
                            <td>{{$goroh->id}}</td>
                            <td>{{$goroh->sender_egrpou}}</td>
                            <td>{{$goroh->sender_name}}</td>
                            <td>{{$goroh->sender_address}}</td>
                            <td>{{$goroh->recipient_name}}</td>
                            <td>{{$goroh->recipient_address}}</td>
                            <td>{{$goroh->contract_holder}}</td>
                            <td>{{$goroh->contract_address}}</td>
                            <td>{{$goroh->declarant_egrpou}}</td>
                            <td>{{$goroh->product_code}}</td>

                            <td>{{$goroh->product_descr}}</td>
                            <td>{{$goroh->trading_country}}</td>
                            <td>{{$goroh->destination_country}}</td>

                            <td>{{$goroh->delivery_conditions}}</td>
                            <td>{{$goroh->delivery_place}}</td>
                            <td>{{$goroh->rvf_usd}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            
                {{$goroh}}
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