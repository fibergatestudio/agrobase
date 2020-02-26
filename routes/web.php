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
    return redirect('tables');
});


/* Стандартная авторизация ларавела */
Auth::routes();

/* Путь к таблицам */
Route::get('/tables', 'TablesController@index')->name('tables.index'); //->middleware('can:user_confirmed'); //->middleware('can:client_rights');


/*** Админ ***/
    /* Управление пользователями */
    Route::get('/admin/users', 'AdminController@users_index')->middleware('can:admin_rights');
    /* Редактирование пользователя */
    Route::get('/admin/users/edit/{user_id}', 'AdminController@user_edit')->middleware('can:admin_rights');
        /* Применить изменения пользователя */
        Route::post('/admin/users/edit/{user_id}/apply', 'AdminController@user_edit_apply')->middleware('can:admin_rights');
        /* Удаление пользователя */
        Route::post('/admin/users/delete/{user_id}/apply', 'AdminController@user_delete_apply')->middleware('can:admin_rights');

/*** Импорт ***/
Route::get('/import', 'ImportController@index')->middleware('can:admin_rights'); //->middleware('can:client_rights');
    /* Отправка формы */
    Route::post('/import/import_excel', 'ImportController@import')->middleware('can:admin_rights'); //->middleware('can:client_rights');
    
    /* Импорт с папки */
    Route::get('import/import_directory', 'ImportController@import_directory')->middleware('can:admin_rights');
