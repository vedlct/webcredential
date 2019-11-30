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
Route::get('/department/add', 'DepartmentController@add')->name('department.add');
Route::post('/departmentShow', 'DepartmentController@showDepartment')->name('department.show');






