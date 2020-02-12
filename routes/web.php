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

Route::get('/', function () {
   // return view('admin.home.home');
    return view('welcome');
});
Route::get('/user-registration', 'UserRegistrationController@showRegistrationForm')->name('user-registration')->middleware('auth');

Route::post('/user-registration', 'UserRegistrationController@usersave')->name('user-save');

Route::get('/user-list', 'UserRegistrationController@userlist')->name('user-list')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user-profiel/{userid}', 'UserRegistrationController@userprofile')->name('user-profile');

Route::get('/change-user-info/{id}', 'UserRegistrationController@changeuserinfo')->name('change-user-info');
Route::post('/update-user-info', 'UserRegistrationController@updateUserInfo')->name('update-user-info');
Route::get('/change-user-pic/{id}', 'UserRegistrationController@changeuserpic')->name('change-user-pic');

Route::post('/upload-userpic', 'UserRegistrationController@changeUserPhoto')->name('upload-userpic');

Route::get('/change-user-password/{id}', 'UserRegistrationController@changeUserPassword')->name('change-user-password');

Route::post('/update-user-passwor', 'UserRegistrationController@updateUserPassword')->name('update-user-password');



