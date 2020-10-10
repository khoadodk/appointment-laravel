<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontEndController@index');

Route::get('/new-appointment/{doctorId}/{date}', 'FrontEndController@show')->name('create.appointment');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

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
