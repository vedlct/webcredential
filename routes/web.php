<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('shares', 'ShareController');
Route::get('/home', 'PageController@index')->name('home');
Route::get('/department', 'DepartmentController@index')->name('department');
Route::get('/department/add','DepartmentController@add')->name('department.add');
Route::post('/department-show','DepartmentController@showDepartment')->name('department.show');
Route::post('/department-insert','DepartmentController@insert')->name('department.insert');
Route::post('/department-delete','DepartmentController@insert')->name('department.delete');
Route::get('/department-edit/{DepartmentId}','DepartmentController@insert')->name('department.edit');
Route::post('/department/update','DepartmentController@update')->name('department.update');



