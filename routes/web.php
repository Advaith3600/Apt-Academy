<?php

Route::view('/', 'pages.welcome');

Auth::routes();

// Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'AdminController@index');
    Route::middleware('admin.guest')->get('/login', 'AdminController@showLoginForm')->name('login.form');
    Route::middleware('admin.guest')->post('/login', 'AdminController@login')->name('login');
    Route::post('/update/profile_picture', 'AdminController@profile')->name('profile_picture');

    Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
        Route::get('/', 'StudentController@index')->name('index');
        Route::get('/register', 'StudentController@register')->name('register');
        Route::post('/store', 'StudentController@store')->name('store');
        Route::get('/{student}/view', 'StudentController@show')->name('show');
        Route::get('/{student}/edit', 'StudentController@edit')->name('edit');
        Route::put('/{student}/update', 'StudentController@update')->name('update');
    });

    Route::group(['prefix' => 'schools', 'as' => 'schools.'], function () {
        Route::get('/', 'SchoolController@index')->name('index');
        Route::get('/create', 'SchoolController@create')->name('create');
        Route::post('/store', 'SchoolController@store')->name('store');
    });

    Route::group(['prefix' => 'admissions', 'as' => 'admissions.'], function () {
        Route::get('/', 'AdmissionController@index')->name('index');
        Route::get('/{admission}/view', 'AdmissionController@show')->name('show');
        Route::put('/{admission}/accept', 'AdmissionController@accept')->name('accept');
        Route::put('/{admission}/reject', 'AdmissionController@reject')->name('reject');
    });

    Route::group(['prefix' => 'faculties', 'as' => 'faculties.'], function () {
        Route::get('/', 'FacultyController@index')->name('index');
        Route::get('/register', 'FacultyController@register')->name('register');
        Route::post('/store', 'FacultyController@store')->name('store');
        Route::get('/{faculty}/view', 'FacultyController@show')->name('show');
        Route::get('/{faculty}/edit', 'FacultyController@edit')->name('edit');
        Route::put('/{faculty}/update', 'FacultyController@update')->name('update');
    });

    Route::group(['prefix' => 'guardians', 'as' => 'guardians.'], function () {
        Route::get('/', 'GuardianController@index')->name('index');
        Route::get('/register', 'GuardianController@register')->name('register');
        Route::post('/store', 'GuardianController@store')->name('store');
    });

    Route::group(['prefix' => 'attendance', 'as' => 'attendance.'], function () {
        Route::get('/index', 'AttendanceController@index')->name('index');
        Route::post('/update/{student}', 'AttendanceController@update')->name('update');
    });
});

Route::group(['prefix' => 'admission', 'as' => 'admission.'], function () {
    Route::get('/', 'AdmissionController@create')->name('index');
    Route::post('/store', 'AdmissionController@store')->name('store');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/', 'ProfileController@index')->name('index');
    Route::get('/edit', 'ProfileController@edit')->name('edit');
    Route::put('/update', 'ProfileController@update')->name('update');
    Route::get('/password', 'ProfileController@password')->name('password');
    Route::put('/password/update', 'ProfileController@passwordUpdate')->name('password.update');
    Route::post('/password/update/picture', 'ProfileController@passwordUpdatePicture');
    Route::middleware('auth:guardian')->get('/manage', 'GuardianController@manage')->name('guardians.index');
});

Route::get('/contact', 'ContactUsController@index');
Route::post('/contact', 'ContactUsController@sendMail');
