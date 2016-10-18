<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Admin', 'Admin\IndexController@index');
Route::get('/Admin/index', 'Admin\IndexController@index');
Route::get('/Admin/Menu/index', 'Admin\MenuController@index');
Route::get('/Admin/Menu/add/{id}', 'Admin\MenuController@add');
Route::post('/Admin/Menu/addPost','Admin\MenuController@addPost');