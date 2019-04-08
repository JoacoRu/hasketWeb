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
Route::get('/index', 'viewsController@viewHome')->name('index');
Route::get('/panel', 'CharacterController@listCharacters')->middleware('auth');
Route::get('/ranking', 'viewsController@viewRanking');
Route::get('/downloads', 'viewsController@viewDownloads');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index');
Route::post('/panel', 'CharacterController@updatePoints')->middleware('auth');
Route::get('/recuperar', 'viewsController@viewPass');
Route::post('/recuperar', 'UserController@resetPassword');
Route::get('/new', 'viewsController@viewNew');
