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

Route::view('/', 'pages.welcome');

Auth::routes();

// Admin Routes
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index');
    Route::middleware('admin.guest')->get('/login', 'AdminController@showLoginForm')->name('admin.login.form');
    Route::middleware('admin.guest')->post('/login', 'AdminController@login')->name('admin.login');

    Route::get('/students', 'StudentController@index')->name('admin.students');
});

Route::group(['prefix' => 'admission'], function() {
    Route::get('/', 'AdmissionController@index')->name('admission.index');
});
