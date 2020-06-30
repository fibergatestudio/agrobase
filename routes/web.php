<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('all_tables');
});


/* Стандартная авторизация ларавела */
Auth::routes();

/* Все таблицы */
Route::get('/all_tables', 'TablesController@all_tables');
/* Все таблицы Международные */
Route::get('/all_tables_international', 'TablesController@all_tables_international');
/* Таблица "Горох" */
Route::get('/all_tables/goroh', 'TablesController@goroh_table');
    Route::get('/all_tables/goroh/import_goroh', 'TablesController@goroh_import');
      /* Отправка формы */
      Route::post('/all_tables/goroh/import_goroh/import_excel', 'ImportController@import_goroh')->middleware('can:admin_rights'); //->middleware('can:client_rights');

/* Путь к таблицам */
Route::get('/table/{table_id}', 'TablesController@index')->name('tables.index'); //->middleware('can:user_confirmed'); //->middleware('can:client_rights');
//Route::get('/table', 'TablesController@index_old')->name('tables.index_old');

/*** Админ ***/
    /* Управление пользователями */
    Route::get('/admin/users', 'AdminController@users_index')->middleware('can:admin_rights');
    /* Редактирование пользователя */
    Route::get('/admin/users/edit/{user_id}', 'AdminController@user_edit')->middleware('can:admin_rights');
        /* Применить изменения пользователя */
        Route::post('/admin/users/edit/{user_id}/apply', 'AdminController@user_edit_apply')->middleware('can:admin_rights');
        /* Удаление пользователя */
        Route::post('/admin/users/delete/{user_id}/apply', 'AdminController@user_delete_apply')->middleware('can:admin_rights');

    /* Добавление пользователя */
    Route::get('/admin/users/add/', 'AdminController@user_add')->middleware('can:admin_rights');
    /* Добавление пользователя Принять*/
    Route::post('/admin/users/add/apply', 'AdminController@user_add_apply')->middleware('can:admin_rights');
    
    /* Управление Таблицами */
    Route::get('/admin/tables_control', 'AdminController@tables_control_index')->middleware('can:admin_rights');
        /* Удаление пользователя */
        Route::post('/admin/tables_control/delete/{table_id}/apply', 'AdminController@table_delete_apply')->middleware('can:admin_rights');

    /* Управление Обьявлениями */
    Route::get('/admin/adverts_control', 'AdminController@adverts_control_index')->middleware('can:admin_rights');
        /* Принять обьявления */
        Route::get('/admin/adverts_control/{advert_id}/apply', 'AdminController@adverts_control_apply')->middleware('can:admin_rights');
         /* Удалить обьявления */
         Route::get('/admin/adverts_control/{advert_id}/delete', 'AdminController@adverts_control_delete')->middleware('can:admin_rights');
    //adverts_control

/*** Импорт ***/
Route::get('/import', 'ImportController@index')->middleware('can:admin_rights'); //->middleware('can:client_rights');
    /* Отправка формы */
    Route::post('/import/import_excel', 'ImportController@import')->middleware('can:admin_rights'); //->middleware('can:client_rights');
    
    /* Импорт с папки */
    Route::get('import/import_directory', 'ImportController@import_directory')->middleware('can:admin_rights');

/*** Импорт Международных Таблиц ***/
Route::get('/import_international', 'ImportController@index_international')->middleware('can:admin_rights'); //->middleware('can:client_rights');
    /* Отправка формы */
    Route::post('/import_international/import_excel', 'ImportController@import_international')->middleware('can:admin_rights'); //->middleware('can:client_rights');



/** Карточки Пользователей */
Route::get('/user_cards', 'UserCardsController@index')->middleware('can:admin_rights');
    /** Карточка Пользователя */
    Route::get('/user_cards/{user_id}', 'UserCardsController@single_card')->middleware(['can:client_rights' || 'can:admin_rights']);


/** Обьявления */
    /* Страница обьявления */
    Route::get('/advert/view/{advert_id}', 'AdvertsController@view_advert');
    /* Страница добавление обьявления */
    Route::get('/advert/create/', 'AdvertsController@create_advert')->middleware(['can:client_rights' || 'can:admin_rights']);
        /* Добавить обьявление POST */
        Route::post('/advert/create/apply', 'AdvertsController@create_advert_apply');



/* Автокомплит */

Route::post('/autocomplete/fetch', 'AdminController@fetch')->name('autocomplete.fetch');