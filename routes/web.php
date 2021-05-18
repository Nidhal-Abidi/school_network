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

  Route::get('/parent/profile','\App\Http\Controllers\ParentController@profile');
  Route::get('/staff/profile','\App\Http\Controllers\StaffController@profile');
  Route::get('/student/profile','\App\Http\Controllers\StudentController@profile');
  Route::get('/teacher/profile','\App\Http\Controllers\TeacherController@profile');

  Route::get('/parent/profileupdate','\App\Http\Controllers\ParentController@edit');
  Route::post('/parent/update','\App\Http\Controllers\ParentController@update');

  Route::get('/staff/profileupdate','\App\Http\Controllers\StaffController@edit');
  Route::post('/staff/update','\App\Http\Controllers\StaffController@update');

  Route::get('/student/profileupdate','\App\Http\Controllers\StudentController@edit');
  Route::post('/student/update','\App\Http\Controllers\StudentController@update');

  Route::get('/teacher/profileupdate','\App\Http\Controllers\TeacherController@edit');
  Route::post('/teacher/update','\App\Http\Controllers\TeacherController@update');

  Route::get('/teacher/news','\App\Http\Controllers\TeacherController@showNews');
  Route::get('/parent/news','\App\Http\Controllers\ParentController@showNews');
  Route::get('/staff/news','\App\Http\Controllers\StaffController@showNews');
  Route::get('/student/news','\App\Http\Controllers\StudentController@showNews');

  Route::get('/staff/news/create','\App\Http\Controllers\StaffController@createNews');
  Route::post('/staff/news/save','\App\Http\Controllers\StaffController@saveNews');

  Route::get('/staff/news/update','\App\Http\Controllers\StaffController@updateNews');
  Route::post('/staff/news/saveupdatednews','\App\Http\Controllers\StaffController@saveUpdatedNews');
  
  Route::post('/staff/news/delete','\App\Http\Controllers\StaffController@deleteNews');
  Route::post('/staff/news/savedeletion','\App\Http\Controllers\StaffController@saveDeletion');

  Route::get('/teacher/chooseclass','\App\Http\Controllers\TeacherController@chooseClass');
  Route::post('/teacher/studentattendance','\App\Http\Controllers\TeacherController@showStudents');
  Route::post('/teacher/saveabsentstudents','\App\Http\Controllers\TeacherController@saveAbsentStudents');

});