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


Route::get('/', 'WelcomeController@index')->name('welcome');

Route::post('/welcome-show', 'WelcomeController@showWelcome')->name('welcome.show');

Route::view('admin/login', 'login');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/department', 'DepartmentController@index')->name('department');
Route::post('/department/insert', 'DepartmentController@insert')->name('department.insert');
//Route::resource('/department','DepartmentController@insert');
Route::post('/departmentShow', 'DepartmentController@showDepartment')->name('department.show');
Route::post('/department-delete', 'DepartmentController@deletedepartment')->name('department.delete');

//--------------------platform----------

Route::get('/platform', 'PlatformController@index')->name('platform');
Route::post('/platform/insert', 'PlatformController@insert')->name('platform.insert');
Route::post('/platformShow', 'PlatformController@showplatform')->name('platform.show');
Route::post('/platform-delete', 'PlatformController@deleteplatform')->name('platform.delete');
Route::post('/platform-edit', 'PlatformController@edit_platform')->name('platform.edit');
Route::post('/platform-update',   'PlatformController@update_platform')->name('platform.update');







