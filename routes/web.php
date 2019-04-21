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

/* VISTAS */
Route::get('/', function(){
    return redirect('/index');
});
Route::get('/index', 'viewsController@viewHome')->name('index');
Route::get('/ranking', 'viewsController@viewRanking');
Route::get('/downloads', 'viewsController@viewDownloads')->middleware('auth');
Route::get('/recuperar', 'viewsController@viewPass');
Route::get('/panel', 'CharacterController@listCharacters')->middleware('auth');
Route::get('/new', 'viewsController@viewNew');
Route::get('/donations', 'viewsController@viewDonations')->name('donations')->middleware('auth');


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');
Route::get('/home', 'HomeController@index');
Route::get('/news', 'NoticeController@list');   
Route::get('/oneNew/{id}', 'NoticeController@byId');
Route::post('/panel', 'CharacterController@updatePoints')->middleware('auth');
Route::post('/recuperar', 'UserController@resetPassword');
Route::post('/new', 'NoticeController@store');
Route::post('/paypal', array('as' => 'addmoney.paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('/paypal', array('as' => 'payment.status','uses' => 'PaypalController@getPaymentStatus',));
