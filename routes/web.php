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



Route::post('/auth/check','\App\Http\Controllers\LogController@check');
Route::get('/','\App\Http\Controllers\LandingPageController@index');
Route::get('/auth/logout','\App\Http\Controllers\LogController@logout');

Route::group(['middleware'=>['AuthCheck']],function(){
  Route::get('/auth/login','\App\Http\Controllers\LogController@login');
  Route::get('/student/index','\App\Http\Controllers\StudentController@index');
  Route::get('/parent/index','\App\Http\Controllers\ParentController@index');
  Route::get('/teacher/index','\App\Http\Controllers\TeacherController@index');
  Route::get('/staff/index','\App\Http\Controllers\StaffController@index');
});