<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('shares', 'ShareController');
Route::get('/home', 'PageController@index')->name('home');
Route::get('/department', 'DepartmentController@index')->name('department');

