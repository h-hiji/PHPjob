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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'Admin\NewsController@add')->middleware('auth');
Route::post('/home', 'Admin\NewsController@tweet')->middleware('auth');
Route::get('/home', 'Admin\NewsController@index')->middleware('auth');
Route::get('/home/{id}', 'Admin\NewsController@delete')->middleware('auth');