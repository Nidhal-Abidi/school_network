<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\AuthCheck;

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



Route::post('/auth/check','\App\Http\Controllers\LoginController@check');


Route::get('/','\App\Http\Controllers\LandingPageController@index');
Route::get('/auth/logout','\App\Http\Controllers\LoginController@logout');

Route::group(['middleware'=>['AuthCheck']],function(){
  Route::get('/auth/login','\App\Http\Controllers\LoginController@index');
  Route::get('/dashboard/{typeCompte}','\App\Http\Controllers\LoginController@dashboard');
  
});