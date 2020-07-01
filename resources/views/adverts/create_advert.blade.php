@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

<div class="container-fluid">
    <div class="container">
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            {{ session()->get('message_success') }}
        </div>
    @endif
        <div class="row">
            <div class="col-sm-12 blog-main">
                <div class="blog-post">
                <h2 class="blog-post-title">Добавить Обьявление</h2>
                    <form method="POST" action="{{ url('/advert/create/apply') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">

                            <label for="action" class="col-md-4 col-form-label text-md-right">Действие</label>
                            <div class="col-md-6">
                                <select id="action" class="form-control" name="action" value="">
                                    <option value="Купить">Купить</option>
                                    <option value="Продать">Продать</option>
                                </select>
                            </div>

                        </div>

                        <!-- NEW -->
                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">Предприятие</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" name="company" value="" placeholder="Предприятие" required>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="prod" class="col-md-4 col-form-label text-md-right">Товар</label>
                            <div class="col-md-6">
                                <select id="prod" class="form-control" name="prod" value="">
                                    <option>Выберите</option>
                                    <option value="ЗЕРНОВЫЕ">ЗЕРНОВЫЕ</option>
                                    <option value="МАСЛИЧНЫЕ">МАСЛИЧНЫЕ</option>
                                    <option value="БОБОВЫЕ">БОБОВЫЕ</option>
                                    <option value="НИШЕВЫЕ КУЛЬТУРЫ">НИШЕВЫЕ КУЛЬТУРЫ</option>
                                    <option value="ПРОДУКТЫ ПЕРЕРАБОТКИ">ПРОДУКТЫ ПЕРЕРАБОТКИ</option>
                                    <option value="ТОПЛИВО ДРЕВЕСНОЕ">ТОПЛИВО ДРЕВЕСНОЕ</option>
                                </select>

                                <!-- Зерновые -->
                                <select id="prod_zern" class="form-control" name="prod_zern" value="">
                                    <option>Выберите</option>
                                    <option value="Пшеница">Пшеница</option>
                                    <option value="Ячмень">Ячмень</option>
                                    <option value="Кукуруза">Кукуруза</option>
                                    <option value="Рожь">Рожь</option>
                                    <option value="Овес">Овес</option>
                                    <option value="Другое">Другое</option>
                                </select>
                                <!-- -->
                                <!-- Масличные -->
                                <select id="prod_masl" class="form-control" name="prod_masl" value="">
                                    <option>Выберите</option>
                                    <option value="Подсолнечник">Подсолнечник</option>
                                    <option value="Рапс">Рапс</option>
                                    <option value="Лен">Лен</option>
                                    <option value="Горчица">Горчица</option>
                                    <option value="Другое">Другое</option>
                                </select>
                                <!-- -->
                                <!-- Бобовые -->
                                <select id="prod_bob" class="form-control" name="prod_bob" value="">
                                    <option>Выберите</option>
                                    <option value="Горох">Горох</option>
                                    <option value="Соя">Соя</option>
                                    <option value="Нут">Нут</option>
                                    <option value="Фасоль">Фасоль</option>
                                    <option value="Чечевица">Чечевица</option>
                                    <option value="Другое">Другое</option>
                                </select>
                                <!-- -->

                                <!-- НИШЕВЫЕ КУЛЬТУРЫ -->
                                <select id="prod_cult" class="form-control" name="prod_cult" value="">
                                    <option>Выберите</option>
                                    <option value="Гречиха">Гречиха</option>
                                    <option value="Просо">Просо</option>
                                    <option value="Сорго">Сорго</option>
                                    <option value="Рис">Рис</option>
                                    <option value="Кориандр">Кориандр</option>
                                    <option value="Ядро подсолнечника">Ядро подсолнечника</option>
                                    <option value="Семечки тыквы">Семечки тыквы</option>
                                    <option value="Другое">Другое</option>
                                </select>
                                <!-- -->

                                <!-- ПРОДУКТЫ ПЕРЕРАБОТКИ -->
                                <select id="prod_pererab" class="form-control" name="prod_pererab" value="">
                                    <option>Выберите</option>
                                    <option value="Мука">Мука > </option>
                                    <option value="Cахар">Cахар</option>
                                    <option value="Отруби">Отруби ></option>
                                    <option value="Жмых">Жмых ></option>
                                    <option value="Шрот">Шрот ></option>
                                    <option value="Крупа">Крупа ></option>
                                    <option value="Масло">Масло ></option>
                                    <option value="Другое">Другое</option>
                                </select>
                                    <!-- Мука -->
                                    <select id="prod_muka" class="form-control" name="prod_muka" value="">
                                        <option>Выберите</option>
                                        <option value="Пшеничная">Пшеничная</option>
                                        <option value="Соевая">Соевая</option>
                                        <option value="Отруби">Кукурузная</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                    <!-- Отруби -->
                                    <select id="prod_otrub" class="form-control" name="prod_otrub" value="">
                                        <option>Выберите</option>
                                        <option value="Пшеничные">Пшеничные</option>
                                        <option value="Ржаные">Ржаные</option>
                                        <option value="Бобовые">Бобовые</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                    <!-- Жмых --> 
                                    <select id="prod_jmih" class="form-control" name="prod_jmih" value="">
                                        <option>Выберите</option>
                                        <option value="Подсолнечный">Подсолнечный</option>
                                        <option value="Соевый">Соевый</option>
                                        <option value="Рапсовый">Рапсовый</option>
                                        <option value="Льняной">Льняной</option>
                                        <option value="Кукурузный">Кукурузный</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                    <!-- Шрот -->
                                    <select id="prod_shrot" class="form-control" name="prod_shrot" value="">
                                        <option>Выберите</option>
                                        <option value="Подсолнечный">Подсолнечный</option>
                                        <option value="Соевый">Соевый</option>
                                        <option value="Рапсовый">Рапсовый</option>
                                    </select>
                                    <!-- Крупа --> 
                                    <select id="prod_krupa" class="form-control" name="prod_krupa" value="">
                                        <option>Выберите</option>
                                        <option value="Пшеничная">Пшеничная</option>
                                        <option value="Гречнивая">Гречнивая</option>
                                        <option value="Пшено">Пшено</option>
                                        <option value="Ячневая">Ячневая</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                    <!-- Масло --> 
                                    <select id="prod_maslo" class="form-control" name="prod_maslo" value="">
                                        <option>Выберите</option>
                                        <option value="Подсолнечное">Подсолнечное</option>
                                        <option value="Соевое">Соевое</option>
                                        <option value="Рапсовое">Рапсовое</option>
                                        <option value="Льняное">Льняное</option>
                                        <option value="Кукурузное">Кукурузное</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                <!-- -->

                                <!-- Топливо Древесное --> 
                                <select id="prod_drev" class="form-control" name="prod_drev" value="">
                                    <option>Выберите</option>
                                    <option value="Гранула">Гранула</option>
                                    <option value="Брекет">Брекет</option>
                                    <option value="Другое">Другое</option>
                                </select>
                                <!-- -->
                                <!-- Другое -->
                                <input id="other" type="text" name="other" placeholder="Введите в ручную" class="form-control">
                                <!-- Скрипт -->
                                <script>
                                $(document).ready(function(){
                                    $("select#prod_zern").hide();
                                    $("select#prod_masl").hide();
                                    $("select#prod_bob").hide();
                                    $("select#prod_cult").hide();
                                    $("select#prod_pererab").hide();

                                        $("select#prod_muka").hide();
                                        $("select#prod_otrub").hide();
                                        $("select#prod_jmih").hide();
                                        $("select#prod_shrot").hide();
                                        $("select#prod_krupa").hide();
                                        $("select#prod_maslo").hide();

                                    $("select#prod_drev").hide();
                                    $("#other").hide();

                                    $("select#prod").on('change',function(){
                                        console.log("Change");
                                        if($(this).val()=="ЗЕРНОВЫЕ"){

                                            $("select#prod_zern").show();
                                            $("select#prod_masl").hide();
                                            $("select#prod_bob").hide();
                                            $("select#prod_cult").hide();
                                            $("select#prod_pererab").hide();

                                                $("select#prod_muka").hide();
                                                $("select#prod_otrub").hide();
                                                $("select#prod_jmih").hide();
                                                $("select#prod_shrot").hide();
                                                $("select#prod_krupa").hide();
                                                $("select#prod_maslo").hide();

                                            $("select#prod_drev").hide();
                                            $("#other").hide();

                                        }else if($(this).val()=="МАСЛИЧНЫЕ"){

                                            $("select#prod_zern").hide();
                                            $("select#prod_masl").show();
                                            $("select#prod_bob").hide();
                                            $("select#prod_cult").hide();
                                            $("select#prod_pererab").hide();

                                                $("select#prod_muka").hide();
                                                $("select#prod_otrub").hide();
                                                $("select#prod_jmih").hide();
                                                $("select#prod_shrot").hide();
                                                $("select#prod_krupa").hide();
                                                $("select#prod_maslo").hide();

                                            $("select#prod_drev").hide();
                                            $("#other").hide();
                                            
                                        }else if($(this).val()=="БОБОВЫЕ"){
                                            $("select#prod_zern").hide();
                                            $("select#prod_masl").hide();
                                            $("select#prod_bob").show();
                                            $("select#prod_cult").hide();
                                            $("select#prod_pererab").hide();

                                                $("select#prod_muka").hide();
                                                $("select#prod_otrub").hide();
                                                $("select#prod_jmih").hide();
                                                $("select#prod_shrot").hide();
                                                $("select#prod_krupa").hide();
                                                $("select#prod_maslo").hide();

                                            $("select#prod_drev").hide();
                                            $("#other").hide();
                                        }else if($(this).val()=="НИШЕВЫЕ КУЛЬТУРЫ"){
                                            $("select#prod_zern").hide();
                                            $("select#prod_masl").hide();
                                            $("select#prod_bob").hide();
                                            $("select#prod_cult").show();
                                            $("select#prod_pererab").hide();

                                                $("select#prod_muka").hide();
                                                $("select#prod_otrub").hide();
                                                $("select#prod_jmih").hide();
                                                $("select#prod_shrot").hide();
                                                $("select#prod_krupa").hide();
                                                $("select#prod_maslo").hide();

                                            $("select#prod_drev").hide();
                                            $("#other").hide();
                                        }else if($(this).val()=="ПРОДУКТЫ ПЕРЕРАБОТКИ"){
                                            $("select#prod_zern").hide();
                                            $("select#prod_masl").hide();
                                            $("select#prod_bob").hide();
                                            $("select#prod_cult").hide();
                                            $("select#prod_pererab").show();
                                            $("select#prod_drev").hide();
                                            $("#other").hide();
                                        }else if($(this).val()=="ТОПЛИВО ДРЕВЕСНОЕ"){
                                            $("select#prod_zern").hide();
                                            $("select#prod_masl").hide();
                                            $("select#prod_bob").hide();
                                            $("select#prod_cult").hide();
                                            $("select#prod_pererab").hide();

                                                $("select#prod_muka").hide();
                                                $("select#prod_otrub").hide();
                                                $("select#prod_jmih").hide();
                                                $("select#prod_shrot").hide();
                                                $("select#prod_krupa").hide();
                                                $("select#prod_maslo").hide();

                                            $("select#prod_drev").show();
                                            $("#other").hide();
                                        }
                                    });

                                    $("select#prod_pererab").on('change',function(){

                                        if($(this).val()=="Мука"){
                                            $("select#prod_muka").show();
                                            $("select#prod_otrub").hide();
                                            $("select#prod_jmih").hide();
                                            $("select#prod_shrot").hide();
                                            $("select#prod_krupa").hide();
                                            $("select#prod_maslo").hide();
                                        }else if($(this).val()=="Отруби"){ 
                                            $("select#prod_muka").hide();
                                            $("select#prod_otrub").show();
                                            $("select#prod_jmih").hide();
                                            $("select#prod_shrot").hide();
                                            $("select#prod_krupa").hide();
                                            $("select#prod_maslo").hide();
                                        }else if($(this).val()=="Жмых"){ 
                                            $("select#prod_muka").hide();
                                            $("select#prod_otrub").hide();
                                            $("select#prod_jmih").show();
                                            $("select#prod_shrot").hide();
                                            $("select#prod_krupa").hide();
                                            $("select#prod_maslo").hide();
                                        }else if($(this).val()=="Шрот"){ 
                                            $("select#prod_muka").hide();
                                            $("select#prod_otrub").hide();
                                            $("select#prod_jmih").hide();
                                            $("select#prod_shrot").show();
                                            $("select#prod_krupa").hide();
                                            $("select#prod_maslo").hide();
                                        }else if($(this).val()=="Крупа"){ 
                                            $("select#prod_muka").hide();
                                            $("select#prod_otrub").hide();
                                            $("select#prod_jmih").hide();
                                            $("select#prod_shrot").hide();
                                            $("select#prod_krupa").show();
                                            $("select#prod_maslo").hide();
                                        }else if($(this).val()=="Масло"){ 
                                            $("select#prod_muka").hide();
                                            $("select#prod_otrub").hide();
                                            $("select#prod_jmih").hide();
                                            $("select#prod_shrot").hide();
                                            $("select#prod_krupa").hide();
                                            $("select#prod_maslo").show();
                                        }

                                    });


                                    $("select#prod_zern").on('change',function(){ 
                                        if($(this).val()=="Другое"){ $("#other").show(); }else{ $("#other").hide(); }
                                    });
                                    $("select#prod_masl").on('change',function(){ 
                                        if($(this).val()=="Другое"){ $("#other").show(); }else{ $("#other").hide(); }
                                    });
                                    $("select#prod_bob").on('change',function(){ 
                                        if($(this).val()=="Другое"){ $("#other").show(); }else{ $("#other").hide(); }
                                    });
                                    $("select#prod_cult").on('change',function(){ 
                                        if($(this).val()=="Другое"){ $("#other").show(); }else{ $("#other").hide(); }
                                    });
                                    $("select#prod_drev").on('change',function(){ 
                                        if($(this).val()=="Другое"){ $("#other").show(); }else{ $("#other").hide(); }
                                    });

                                    $("select#prod_muka").on('change',function(){ 
                                        if($(this).val()=="Другое"){ $("#other").show(); }else{ $("#other").hide(); }
                                    });
                                    $("select#prod_otrub").on('change',function(){ 
                                        if($(this).val()=="Другое"){ $("#other").show(); }else{ $("#other").hide(); }
                                    });
                                    $("select#prod_jmih").on('change',function(){ 
                                        if($(this).val()=="Другое"){ $("#other").show(); }else{ $("#other").hide(); }
                                    });
                                    $("select#prod_shrot").on('change',function(){ 
                                        if($(this).val()=="Другое"){ $("#other").show(); }else{ $("#other").hide(); }
                                    });
                                    $("select#prod_krupa").on('change',function(){ 
                                        if($(this).val()=="Другое"){ $("#other").show(); }else{ $("#other").hide(); }
                                    });
                                    $("select#prod_maslo").on('change',function(){ 
                                        if($(this).val()=="Другое"){ $("#other").show(); }else{ $("#other").hide(); }
                                    });

                                });
                                </script>
                                <!-- -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sale_place" class="col-md-4 col-form-label text-md-right">Место поставки</label>

                            <div class="col-md-6">
                                <input id="sale_place" type="text" class="form-control" name="sale_place" value="" placeholder="Место поставки" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- <label for="sale_type" class="col-md-2 col-form-label text-md-right">Вид продажи</label>

                            <div class="col-md-4">
                                <input id="sale_type" type="text" class="form-control" name="sale_type" value="" placeholder="Вид продажи" required>
                            </div> -->
                            <label for="delivery" class="col-md-4 col-form-label text-md-right">Вид поставки</label>
                            <div class="col-md-6">
                                <select id="delivery" class="form-control" name="delivery" value="">
                                    <option default>Выберите действие</option>
                                    <option value="EXW">EXW (продажа со склада продавца)</option>
                                    <option value="FCA">FCA (продажа, затаможенный и загруженный на транспорт покупателя)</option>
                                    <option value="CPT">CPT (продажа на складе покупателя)</option>
                                    <option value="FOB">FOB (продажа на борту судна в порту продавца)</option>
                                    <option value="CIF">CIF (продажа в порту покупателя)</option>
                                    <option value="DAP">DAP (продажа на складе покупателя, экспорт)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short_text" class="col-md-4 col-form-label text-md-right">Краткий текст</label>

                            <div class="col-md-6">
                                <textarea id="short_text" class="form-control" name="short_text" placeholder="Краткий текст" required></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Цена (за тонну)</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="" placeholder="Цена" required>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="currency" class="col-md-4 col-form-label text-md-right">Валюта</label>
                            <div class="col-md-6">
                                <select id="currency" class="form-control" name="currency" value="">
                                    <option value="грн">грн</option>
                                    <option value="руб">руб</option>
                                    <option value="доллар">доллар</option>
                                    <option value="евро">евро</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                           
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Количество</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount" value="" placeholder="Количество" required>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="prod_descr" class="col-md-4 col-form-label text-md-right">Описание товара</label>

                            <div class="col-md-6">
                                <textarea id="prod_descr" type="text" class="form-control" name="prod_descr" value="" placeholder="Описание товара" required></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">

                            <label for="prod_photo" class="col-md-4 col-form-label text-md-right">Фото (множественная выборка)</label>

                            <div class="col-md-6">
                                <input id="prod_photo" type="file" class="form-control" name="prod_photo[]" value="" placeholder="Фото" multiple>
                            </div>

                        </div>
                        <!-- END NEW -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Добавить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')

@stop