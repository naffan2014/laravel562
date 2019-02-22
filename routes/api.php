<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


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
Route::get('index','UserController@index');
Route::get('showProfile/{id}','UserController@showProfile');
Route::get('fakeInsert','UserController@fakeInsert');
Route::get('routeCurrent',function(){
    $route = Route::current();
});

Route::get('showAge/{id}','UserController@showProfile')->middleware('checkage:宁次');

//Route::get('showAge/{id}','UserController@showProfile')->middleware('checkll:天天');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/saveData','DataController@save');
Route::get('/getData','DataController@get');

Route::get('publish',function(){
    Redis::publish('test-channel',json_encode(['foo'=>'bar']));
});

Route::get('/cache', function () {
    return Cache::get('key');
});

Route::get('testFacade','UserController@testFacade');