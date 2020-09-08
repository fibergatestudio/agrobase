@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')
<div class="tables">

@if(isset($user))
    <style>

    .frontpage_square{
    position:relative;
    overflow:hidden;
    padding-bottom:100%;
    }
    .frontpage_square img{
    position:absolute;
    }

    </style>

    @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif

    @if($user->status == "confirmed" || $user->status == "expired" || $user->status == "unconfirmed")
    <h3 class="tables_title">Все таблицы</h3>
        <div class="tables_regions">
        @foreach($tables_ua as $t)

            <div class="tables_regions-inner">
                <a href="{{ url('/table/'. $t->id) }}"> {{ $t->table_name }}</a>
            </div>
        @endforeach   
        </div>
        @if($user->role == "admin")
            <a href="{{ url('/import') }}"><button class="tables-btn">Импорт таблицы</button></a>
        @endif
    @endif

@else
    <div class="container">
        <div class="alert alert-success" role="alert">
            Пожалуйста залогиньтесь!
        </div>
    </div>
@endif

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