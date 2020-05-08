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
    /* Управление Таблицами */
    Route::get('/admin/tables_control', 'AdminController@tables_control_index')->middleware('can:admin_rights');
        /* Удаление пользователя */
        Route::post('/admin/tables_control/delete/{table_id}/apply', 'AdminController@table_delete_apply')->middleware('can:admin_rights');

/*** Импорт ***/
Route::get('/import', 'ImportController@index')->middleware('can:admin_rights'); //->middleware('can:client_rights');
    /* Отправка формы */
    Route::post('/import/import_excel', 'ImportController@import')->middleware('can:admin_rights'); //->middleware('can:client_rights');
    
    /* Импорт с папки */
    Route::get('import/import_directory', 'ImportController@import_directory')->middleware('can:admin_rights');
