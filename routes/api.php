<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::get('/countries', 'ApiController@bringCountries');
Route::get('/username/{username}', 'ApiController@validUsername');
Route::get('/email/{email}', 'ApiController@validEmail');
Route::get('/bringPjByUserName/{username}', 'ApiController@bringPjByUserName');
Route::get('/reset/{username}', 'ApiController@reset');
Route::get('/bringPoints/{username}', 'ApiController@bringPointsOfACharacter');
Route::get('/resetPoints/{username}', 'ApiController@resetStat');
Route::get('/countCharacters', 'ApiController@countCharacters');
Route::get('/countAccounts', 'ApiController@countAccounts');
Route::get('/countGuilds', 'ApiController@countGuilds');
Route::get('/usersOn', 'ApiController@usersOn');
Route::get('/resetRanking', 'ApiController@rankingReset');
Route::get('/guildRanking', 'ApiController@rankingGuild');
Route::get('/genRanking', 'ApiController@rankingGens');
Route::get('/news', 'ApiController@bringNews');
Route::get('/userOn/{username}', 'ApiController@userOn');
Route::get('/bringPointsDl/{username}', 'ApiController@bringPointsDl');
Route::get('/resetPointsDl/{username}', 'ApiController@resetStatDl');