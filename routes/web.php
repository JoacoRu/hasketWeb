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
Route::get('/index', 'viewsController@viewHome');
Route::get('/panel', 'viewsController@viewPanelUser');
Route::get('/ranking', 'viewsController@viewRanking');
Route::get('/downloads', 'viewsController@viewDownloads');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Route::get('/home', 'HomeController@index');
