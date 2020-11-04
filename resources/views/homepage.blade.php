@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')


<div class="import_main">
    <div class="import_wrapper">
        <h3 class="import_title">Главная Страница</h3>
    <!-- <div class="container"> -->
        <p class="text-sm-left"><b>Уважаемые коллеги!</b> Мы приветствуем Вас на нашем сайте-справочнике. Сайт - справочник включает в себя компьютерную и мобильную версию. К нему прикреплены чат-сообщетва в:</p>
        <br>
        <p class="text-sm-left"><b>Telegram:</b> <a href="https://t.me/AgroProdExport">https://t.me/AgroProdExport</a></p>
        <p class="text-sm-left"><b>Viber:</b> <a href="https://invite.viber.com/?g2=AQAvupAtoR%2Bh00vR3%2BtwQMx0DLc5QqBjHs7O0wCQQca1%2F7DKQdbnBok9Fhbi1dt5">https://invite.viber.com/?g2=AQAvupAtoR%2Bh00vR3%2BtwQMx0DLc5QqBjHs7O0wCQQca1%2F7DKQdbnBok9Fhbi1dt5</a></p>
        <br>
        </p><b>Так же сообщества в:</b></p>
        <br>
        <p class="text-sm-left"><b>Вконтакте:</b> <a href="https://vk.com/agrofoodexport">https://vk.com/agrofoodexport</a></p>
        <p class="text-sm-left"><b>Facebook:</b> <a href="https://www.facebook.com/agrofoodexport">https://www.facebook.com/agrofoodexport</a></p>
        <br>
        <p class="text-sm-left"><b>Справочник</b> создан для облегчения поиска партнеров, покупателей и продавцов сельскохозяйственных товаров, продуктов их переработки и продуктов питания на территории стран <b>СНГ, Европы, Азии и Америки.</b> </p>
        <br>
        <p class="text-sm-left"><b>Справочник</b> содержит списки экспортеров и импортеров таких товаров как: зерновые культуры, масличные культуры, овощи, фрукты, бобовые культуры, орехи,  масло, мука и тд. <b>Все контакты действительны и занимаются ВЭД</b>, в справочнике около 90 таблиц по разным товарам, в подарок справочник фермеров. Все ссылки активны и синхронизированны компьютер - смартфон.</p>
        <!-- <p><b>Цены</b> </p> -->
        <br>
        <table class="table">
            <thead>
                <tr>

                <th>Цена подписки</th>
                <th>Валюта </th>
                </tr>
            </thead>
            <tbody>
                <tr>

                <td>200</td>
                <td>гривен</td>
                </tr>
                <tr>

                <td>500</td>
                <td>рублей</td>
                </tr>
                <tr>

                <td>5</td>
                <td>евро</td>
                </tr>
                <tr>

                <td>6</td>
                <td>Долларов</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    <!-- </div> -->

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