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

//Route::view('admin/login', 'login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//---------------------------Department------------------
Route::get('/department', 'DepartmentController@index')->name('department');

Route::post('/department/insert', 'DepartmentController@insert')->name('department.insert');
//Route::resource('/department','DepartmentController@insert');
Route::post('/departmentShow', 'DepartmentController@showDepartment')->name('department.show');
Route::post('/department-delete', 'DepartmentController@deletedepartment')->name('department.delete');
Route::post('/department-edit', 'DepartmentController@edit_department')->name('department.edit');
Route::post('/department-update/{DepartmentId}','DepartmentController@update_department')->name('department.update');

//--------------------platform----------

Route::get('/platform', 'PlatformController@index')->name('platform');
Route::post('/platform/insert', 'PlatformController@insert')->name('platform.insert');
Route::post('/platformShow', 'PlatformController@showplatform')->name('platform.show');
Route::post('/platform-delete', 'PlatformController@deleteplatform')->name('platform.delete');
Route::post('/platform-edit', 'PlatformController@edit_platform')->name('platform.edit');
Route::post('/platform-update/{PlatformId}',   'PlatformController@update_platform')->name('platform.update');


//------------------------Credential-------------

Route::get('/credential', 'CredentialController@index')->name('credential');
Route::get('/getusers/{UserId}','CredentialController@getUsers');
Route::post('/credential/insert', 'CredentialController@insert')->name('credential.insert');
Route::post('/credentialShow', 'CredentialController@showcredential')->name('credential.show');
Route::post('/credential-delete', 'CredentialController@deletecredential')->name('credential.delete');
Route::post('/credential-edit', 'CredentialController@edit_credential')->name('credential.edit');
Route::post('/credential-update/{Credentialid}','CredentialController@update_credential')->name('credential.update');
Route::post('/role-set','CredentialController@set')->name('role.set');
Route::post('/role-save','CredentialController@save')->name('role.save');



//------------------------Role-------------




//----------------------------User Management--------------

//Route::get('/user', 'UserController@index')->name('user');
//Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/user','UserController@index')->name('user');
Route::post('/user-insert','UserController@insert')->name('user.insert');
Route::post('/user-getlist','UserController@getuserdata')->name('user.getdata');
Route::post('/user-edit','UserController@edit')->name('user.edit');
Route::post('/user-update/{id}','UserController@update')->name('user.update');
Route::post('/user-delete','UserController@deleteuser')->name('user.delete');




//----------------------------User type--------------

Route::get('/usertype','UsertypeController@index')->name('usertype');
Route::post('/usertype-insert','UsertypeController@insert')->name('usertype.insert');
Route::post('/usertype-show','UsertypeController@showusertype')->name('usertype.show');
Route::post('/usertype-delete','UsertypeController@deleteusertype')->name('usertype.delete');
Route::post('/usertype-edit', 'UsertypeController@edit_usertype')->name('usertype.edit');
Route::post('/usertype-insert','UsertypeController@insert')->name('usertype.insert');
Route::post('/usertype-update/{UserTypeId}','UsertypeController@update_usertype')->name('usertype.update');


//Route::post('/insert','UsertypeController@insert');

Route::post('/showUsertype','UsertypeController@showusertype')->name('usertype.show');













Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
