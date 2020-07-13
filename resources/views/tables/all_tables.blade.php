@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')


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
    <div class="container text-center">
    <h1>Все таблицы</h1> 
        <br>
        <div class="row text-center">
            @foreach($tables_ua as $t)
                <div class="col-sm-3 bg-success border">
                    <div class="row text-center h-100">
                        <a href="{{ url('/table/'. $t->id) }}" class="thumbnail tablelink" style="width: 100%;">
                            <div class=" card-block justify-content-center" style="line-height: 200px;">
                                <div class="card-body text-center" style="    
                                clear: both;
                                display: inline-block;
                                overflow: hidden;
                                white-space: nowrap;
                                font-size: 22px;">
                                    {{ $t->table_name }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach    
        </div>
    </div>
        @if($user->role == "admin")
            <div class="row text-center">
                <div class="col-md-12 center-block pt-5">
                    <a href="{{ url('/import') }}">
                        <button class="btn btn-success">Импорт Таблицы</button>
                    </a>
                </div>
            </div>
        @endif
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