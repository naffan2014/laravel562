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
Route::get('/test',function(){
    return "ahahahah";
});

Route::get('showProfile/{id}','UserController@showProfile');
Route::get('fakeInsert','UserController@fakeInsert');
Route::get('routeCurrent',function(){
    $route = Route::current();
    print_r($route);
});

Route::get('showAge/{id}','UserController@showProfile')->middleware('checkage:宁次');

//Route::get('showAge/{id}','UserController@showProfile')->middleware('checkll:天天');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
