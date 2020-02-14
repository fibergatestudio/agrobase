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
    return view('welcome');
});


/* Стандартная авторизация ларавела */
Auth::routes();

/* Путь к таблицам */
Route::get('/tables', 'TablesController@index'); //->middleware('can:client_rights');


/*** Админ ***/
    /* Управление пользователями */
    Route::get('/admin/users', 'AdminController@users_index')->middleware('can:admin_rights');

//Route::get('users', ['uses'=>'UsersController@index', 'as'=>'users.index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
