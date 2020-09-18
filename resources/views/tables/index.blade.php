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



            <div class="carpathians-main">
                <div class="carpathians-wrapper">
                    <h3 class="carpathians-title--top">Таблица {{ $table_info->table_name }}</h3>
                    <h5 class="carpathians-title--bottom">Количество предприятий: <span>{{ $t_count }}</span></h5>
                    <div class="carpathians-topbtn-wrapper">
                        <div class="carpathians-topbtn-inner">
                            <a href="{{ url('/all_tables') }}"><button class="carpathians-topbtn">Выбор таблицы</button></a>
                            @if(isset($regions))
                            <div class="selectbtn-region"><span>Выбор области</span>
                                <a class="selectbtn-region-link" href="##"></a>                              
                                <div class="selectbtn-region-badge">
                                    @foreach($regions as $region)
                                    <div class="selectbtn-region-badge_inner"><a href="{{ route('tables.index', ['table_id' => $table_id,'oblast' => $region->oblast]) }}">{{ $region->oblast }}</a></div>
                                    @endforeach
                                </div>                             
                            </div>
                            @endif
                            @if(isset($areas))
                            <div class="selectbtn-district"><span>Выбор района</span> 
                                <a class="selectbtn-district-link" href="##"></a>
                                <div class="selectbtn-district-badge">
                                    @foreach($areas as $area)
                                    <div class="selectbtn-district-badge_inner"><a href="{{ route('tables.index', ['table_id' => $table_id,'rayon' => $area->rayon]) }}">{{ $area->rayon }}</a></div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="carpathians-topbtn-inner">

                            <div class="selectbtn-sort"><span>Сортировка</span>
                                <a class="selectbtn-sort-link" href="##"></a>
                                <div class="selectbtn-sort-badge">
                                    <div class="selectbtn-sort-badge_inner"><a href="{{ route('tables.index', ['table_id' => $table_id,'oblast' => request('oblast'), 'rayon' => request('rayon'),  'sort' => 'asc']) }}">По возрастанию</a></div>
                                    <div class="selectbtn-sort-badge_inner"><a href="{{ route('tables.index', ['table_id' => $table_id,'oblast' => request('oblast'), 'rayon' => request('rayon'),  'sort' => 'desc']) }}">Убыванию</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carpathians-scroll-container">
                    <div class="carpathians-scroll-inner">
                        <table class="peaexport-table">
                            <tr class="carpathians-topmenu">
                                    <td class="carpathians-topmenu-item">#</td>
                                    <?php $column_count = 0; ?>
                                    @foreach($table_heads_text as $column)
                                        <?php $column_count++; ?>
                                        @if($column_count <= 5)
                                            <td class="carpathians-topmenu-item">{{$column}}</td>
                                        @elseif($column_count >= 9)
                                            <td class="carpathians-topmenu-item">{{$column}}</td>
                                        @endif
                                    @endforeach
                            </tr>
                            @foreach($table_rows as $row)
                        <?php 
                        $phone_index = '1'; 
                        $row_count = 0;
                        $row_c = 0;
                        ?>
                            <tr class="carpathians-string">
                                @foreach($table_head_columns as $column)
                                <?php $row_count++; ?>
                                @if($row_count <= 6)
                                
                                    <td class="carpathians-string-item">
                                        <?php if(preg_match("/\(?[2-9][0-8][0-9]\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}/", $row->$column)) { ?>
                                            @if($user->status != "unconfirmed" && $user->status !="expired")
                                            <!-- <a class="carpathians-string_phone" href="tel:{{ $row->$column }}"> -->
                                                    <?php 
                                                    // Фикс двойных номеров
                                                    $phones_arr = explode(" ", $row->$column);
                                                    foreach(array_filter($phones_arr) as $phone){ ?>
                                                <!-- <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i>  -->
                                                    <a class="carpathians-string_phone" href="tel:{{ $phone }}"> 
                                                    <?php 
                                                    //echo 'Телефон ' . $phone_index++; 
                                                    echo $phone;
                                                    ?>              
                                                    </a>                         
                                                <!-- </button>                                                     -->
                                                    <?php } ?>
                                            <!-- </a> -->
                                            @endif
                                        <?php } else if(preg_match('/^[0-9]{10}$/', $row->$column)) { ?>
                                            @if($user->status != "unconfirmed" && $user->status !="expired")
                                            <?php 
                                            $full_phone = $row->$column;
                                            $full_phone = "+38" . $full_phone;
                                            ?>
                                            <a class="carpathians-string_phone" href="tel:{{ $full_phone }}">
                                                <!-- <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i>   -->
                                                    {{ $full_phone }}
                                                    <?php 
                                                    //echo 'Телефон ' . $phone_index++; 
                                                    ?>                                       
                                                <!-- </button> -->
                                            </a>
                                            @endif
                                        <?php } else if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $row->$column)) { ?>
                                            @if($user->status != "unconfirmed" && $user->status !="expired")
                                            <a class="carpathians-string_phone" href="mailto:{{ $row->$column }}">
                                                <!-- <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i>       -->
                                                    {{ $row->$column }}
                                                <!-- </button> -->
                                            </a>
                                            @endif
                                        <?php } else { ?>
                                            {{ $row->$column }}
                                        <?php } ?>
                                    </td>
                                    @elseif($row_count >= 10)
                                    <td class="carpathians-string-item">
                                        <?php 
                                        $filter_mail = str_replace("E-mail: ","", $row->$column); 
                                        $filter_mail = str_replace(' ', '', $filter_mail);
                                        ?>
                                        <?php if(preg_match("/\(?[2-9][0-8][0-9]\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}/", $row->$column)) { ?>
                                            @if($user->status != "unconfirmed" && $user->status !="expired")
                                            <a class="peaimport-string_email" href="tel:{{ $row->$column }}">
                                                <!-- <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i>      -->
                                                    {{ $row->$column }} 
                                                    <?php 
                                                    //echo 'Телефон ' . $phone_index++; 
                                                    ?>                                       
                                                <!-- </button> -->
                                            </a>
                                            @endif
                                        <?php } else if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $filter_mail )) { ?>
                                            @if($user->status != "unconfirmed" && $user->status !="expired")
                                            <a class="peaimport-string_email" href="mailto:{{ $filter_mail }}">
                                                <!-- <button class="btn btn-success m-1"> <i class="fas fa-envelope"></i>     -->
                                                    {{ $filter_mail }}
                                                <!-- </button> -->
                                            </a>
                                          
                                            
                                            <input type="hidden" id="copy_{{ $row->id }}" value="{{ $filter_mail }}">
                                            <!-- <button onclick="copyToClipboard('copy_{{ $row->id }}')" class="btn btn-success m-1">Copy</button> -->
                                            <button class="btn btn-success m-1" onclick="copyToClipboard('#copy_{{ $row->id }}')">
                                                <i class="fa fa-clone" aria-hidden="true"></i>
                                                Копировать
                                            </button> 
                                            @endif
                                        <?php } else { ?>

                                            <?php   
                                                $website = $row->$column;
                                                if(preg_match('/^(http)/', $website)){
                                                    //$website = "http://" . $website; ?>
                                                    <a class="peaimport-string_email" href="{{ $website }}">{{ $website }}</a>
                                                <?php } else { ?>

                                                    {{ $row->$column }}

                                                <?php } ?>
                                            
                                        <?php } ?>
                                    </td>
                                @endif


                                @endforeach
                            </tr>
                        @endforeach

                        </div>
                    </div>
                    </table>

                    {{ $table_rows->links('vendor.pagination.default') }}

                </div>
            </div>



    @if($user->status == "confirmed" || $user->status == "expired" || $user->status == "unconfirmed")
    <div style="display:none;" class="container-fluid">
    <h1> Таблица {{ $table_info->table_name }}</h1>
    Кол-во предприятий: {{ $t_count }}<br>
    <a href="{{ url('/all_tables') }}"><button class="btn btn-success">Выбор Таблицы</button></a>
    <!-- <a href="{{ url('/import') }}"><button class="btn btn-success">Импортировать</button></a> -->
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
                            <?php $column_count = 0; ?>
                            @foreach($table_heads_text as $column)
                                <?php $column_count++; ?>
                                @if($column_count <= 5)
                                    <th>{{$column}}</th>
                                @elseif($column_count >= 9)
                                    <th>{{$column}}</th>
                                @endif
                            @endforeach
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($table_rows as $row)
                        <?php 
                        $phone_index = '1'; 
                        $row_count = 0;
                        $row_c = 0;
                        ?>
                            <tr>
                                @foreach($table_head_columns as $column)
                                <?php $row_count++; ?>
                                @if($row_count <= 6)
                                
                                    <td>
                                        <?php if(preg_match("/\(?[2-9][0-8][0-9]\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}/", $row->$column)) { ?>
                                            @if($user->status != "unconfirmed" && $user->status !="expired")
                                            <a href="tel:{{ $row->$column }}">
                                                    <?php 
                                                    // Фикс двойных номеров
                                                    $phones_arr = explode(" ", $row->$column);
                                                    foreach(array_filter($phones_arr) as $phone){ ?>
                                                <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i>   
                                                    <?php 
                                                    //echo 'Телефон ' . $phone_index++; 
                                                    echo $phone;
                                                    ?>                                       
                                                </button>                                                    
                                                    <?php } ?>
                                            </a>
                                            @endif
                                        <?php } else if(preg_match('/^[0-9]{10}$/', $row->$column)) { ?>
                                            @if($user->status != "unconfirmed" && $user->status !="expired")
                                            <?php 
                                            $full_phone = $row->$column;
                                            $full_phone = "+38" . $full_phone;
                                            ?>
                                            <a href="tel:{{ $full_phone }}">
                                                <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i>  
                                                    {{ $full_phone }}
                                                    <?php 
                                                    //echo 'Телефон ' . $phone_index++; 
                                                    ?>                                       
                                                </button>
                                            </a>
                                            @endif
                                        <?php } else if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $row->$column)) { ?>
                                            @if($user->status != "unconfirmed" && $user->status !="expired")
                                            <a href="mailto:{{ $row->$column }}">
                                                <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i>      
                                                    {{ $row->$column }}
                                                </button>
                                            </a>
                                            @endif
                                        <?php } else { ?>
                                            {{ $row->$column }}
                                        <?php } ?>
                                    </td>
                                    @elseif($row_count >= 10)
                                    <td>
                                        <?php 
                                        $filter_mail = str_replace("E-mail: ","", $row->$column); 
                                        $filter_mail = str_replace(' ', '', $filter_mail);
                                        ?>
                                        <?php if(preg_match("/\(?[2-9][0-8][0-9]\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}/", $row->$column)) { ?>
                                            @if($user->status != "unconfirmed" && $user->status !="expired")
                                            <a href="tel:{{ $row->$column }}">
                                                <button class="btn btn-success m-1"> <i class="fas fa-phone-alt"></i>     
                                                    {{ $row->$column }} 
                                                    <?php 
                                                    //echo 'Телефон ' . $phone_index++; 
                                                    ?>                                       
                                                </button>
                                            </a>
                                            @endif
                                        <?php } else if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $filter_mail )) { ?>
                                            @if($user->status != "unconfirmed" && $user->status !="expired")
                                            <a href="mailto:{{ $filter_mail }}">
                                                <button class="btn btn-success m-1"> <i class="fas fa-envelope"></i>    
                                                    {{ $filter_mail }}
                                                </button>
                                            </a>
                                          
                                            
                                            <input type="hidden" id="copy_{{ $row->id }}" value="{{ $filter_mail }}">
                                            <!-- <button onclick="copyToClipboard('copy_{{ $row->id }}')" class="btn btn-success m-1">Copy</button> -->
                                            <button class="btn btn-success m-1" onclick="copyToClipboard('#copy_{{ $row->id }}')">
                                                <i class="fa fa-clone" aria-hidden="true"></i>
                                                Копировать
                                            </button> 
                                            @endif
                                        <?php } else { ?>
                                            {{ $row->$column }}
                                        <?php } ?>
                                    </td>
                                @endif


                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        
                {{ $table_rows->links() }}
            </div>
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

<!-- <p id="p1">Hello, I'm TEXT 1</p>
<p id="p2">Hi, I'm the 2nd TEXT</p><br/>

<button onclick="copyToClipboard('#p1')">Copy TEXT 1</button>
<button onclick="copyToClipboard('#p2')">Copy TEXT 2</button> -->

@stop

@section('scripts')

<script>
function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(
        $(element).val()
        ).select();
    document.execCommand("copy");
    $temp.remove();
}

</script>

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