<?php

use Illuminate\Support\Facades\Route;

// Home Page Routes
Route::get('/', 'FrontEndController@index');
Route::get('/new-appointment/{doctorId}/{date}', 'FrontEndController@show')->name('create.appointment');

Route::get('/dashboard', 'DashBoardController@index');

Route::get('/home', 'HomeController@index')->name('home');

// Profile Routes
Route::get('/user-profile', 'ProfileController@index')->name('profile');
Route::post('/user-profile', 'ProfileController@store')->name('profile.store');
Route::post('/profile-pic', 'ProfileController@profilePic')->name('profile.pic');

Auth::routes();

// Patient Routes
Route::group(['middleware' => ['auth', 'patient']], function () {
    Route::post('/book/appointment', 'FrontendController@store')->name('book.appointment');
    Route::get('/my-booking', 'FrontendController@myBookings')->name('my.booking');
});
// Admin Routes
Route::group(['middleware' => ['auth', 'admin',]], function () {
    Route::resource('doctor', 'DoctorController');
});
// Doctor Routes
Route::group(['middleware' => ['auth', 'doctor',]], function () {
    Route::resource('appointment', 'AppointmentController');
    Route::post('/appointment/check', 'AppointmentController@check')->name('appointment.check');
    Route::post('/appointment/update', 'AppointmentController@updateTime')->name('update');
});
