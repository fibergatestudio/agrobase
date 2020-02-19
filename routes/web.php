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
Route::get('/tables', 'TablesController@index')->name('tables.index'); //->middleware('can:client_rights');


/*** Админ ***/
    /* Управление пользователями */
    Route::get('/admin/users', 'AdminController@users_index')->middleware('can:admin_rights');
    /* Редактирование пользователя */
    Route::get('/admin/users/edit/{user_id}', 'AdminController@user_edit')->middleware('can:admin_rights');
    /* Применить изменения пользователя */
    Route::post('/admin/users/edit/{user_id}/apply', 'AdminController@user_edit_apply')->middleware('can:admin_rights');

//Route::get('users', ['uses'=>'UsersController@index', 'as'=>'users.index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
