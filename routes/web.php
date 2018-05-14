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
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', 'AdminController@index');
    Route::middleware('admin.guest')->get('/login', 'AdminController@showLoginForm')->name('login.form');
    Route::middleware('admin.guest')->post('/login', 'AdminController@login')->name('login');

    Route::get('/students', 'StudentController@index')->name('students');

    Route::group(['prefix' => 'schools', 'as' => 'schools.'], function() {
        Route::get('/', 'SchoolController@index')->name('index');
        Route::get('/create', 'SchoolController@create')->name('create');
        Route::post('/store', 'SchoolController@store')->name('store');
    });

    Route::group(['prefix' => 'admissions', 'as' => 'admissions.'], function() {
        Route::get('/', 'AdmissionController@index')->name('index');
        Route::get('/{id}/view', 'AdmissionController@show')->name('show');
        Route::put('/{id}/accept', 'AdmissionController@update')->name('accept');
    });
});

Route::group(['prefix' => 'admission', 'as' => 'admission.'], function() {
    Route::get('/', 'AdmissionController@create')->name('index');
    Route::post('/store', 'AdmissionController@store')->name('store');
});

Route::get('/contact', 'ContactUsController@index');
Route::post('/contact', 'ContactUsController@sendMail');
