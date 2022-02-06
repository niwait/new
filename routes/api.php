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
*/ //Route::middleware('auth:api')->get('/users/list', 

Route::middleware('auth:api')->get('/tasks', 'TaskController@index');
Route::middleware('auth:api')->post('/tasks', 'TaskController@store');
Route::middleware('auth:api')->get('/tasks/{task}', 'TaskController@show');
Route::middleware('auth:api')->put('/tasks/{task}', 'TaskController@update');
Route::middleware('auth:api')->delete('/tasks/{task}', 'TaskController@destroy');

//認証系
Route::post('/login', 'AuthController@login');
Route::post('/user/create', 'AuthController@userCreate');
Route::middleware('auth:api')->post('/logout', 'AuthController@logout');
