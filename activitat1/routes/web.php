<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/coches', 'App\Http\Controllers\CocheController@index');
Route::post('/coches', 'App\Http\Controllers\CocheController@store');
Route::get('/coches/{id}', 'App\Http\Controllers\CocheController@show');
Route::put('/coches/{id}', 'App\Http\Controllers\CocheController@update');
Route::delete('/coches/{id}', 'App\Http\Controllers\CocheController@destroy');


