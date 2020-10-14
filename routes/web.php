<?php

use Illuminate\Support\Facades\Route;

// Home Page Routes
Route::get('/', 'FrontEndController@index');
Route::get('/new-appointment/{doctorId}/{date}', 'FrontEndController@show')->name('create.appointment');

Route::get('/dashboard', 'DashBoardController@index');

Route::get('/home', 'HomeController@index');

Auth::routes();

// Patient Routes
Route::group(['middleware' => ['auth', 'patient']], function () {
    // Profile Routes
    Route::get('/user-profile', 'ProfileController@index')->name('profile');
    Route::post('/user-profile', 'ProfileController@store')->name('profile.store');
    Route::post('/profile-pic', 'ProfileController@profilePic')->name('profile.pic');

    Route::post('/book/appointment', 'FrontEndController@store')->name('book.appointment');
    Route::get('/my-booking', 'FrontEndController@myBookings')->name('my.booking');
    Route::get('/my-prescription', 'FrontEndController@myPrescription')->name('my.prescription');
});
// Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('doctor', 'DoctorController');
    Route::get('/patients', 'PatientListController@index')->name('patients');
    Route::get('/status/update/{id}', 'PatientListController@toggleStatus')->name('update.status');
    Route::get('/all-patients', 'PatientListController@allTimeAppointment')->name('all.appointments');
    Route::resource('/department', 'DepartmentController');
});
// Doctor Routes
Route::group(['middleware' => ['auth', 'doctor']], function () {
    Route::resource('appointment', 'AppointmentController');
    Route::post('/appointment/check', 'AppointmentController@check')->name('appointment.check');
    Route::post('/appointment/update', 'AppointmentController@updateTime')->name('update');
    Route::get('patient-today', 'PrescriptionController@index')->name('patient.today');
    Route::post('prescription', 'PrescriptionController@store')->name('prescription');
    Route::get('/prescription/{userId}/{date}', 'PrescriptionController@show')->name('prescription.show');
    Route::get('/all-prescriptions', 'PrescriptionController@showAllPrescriptions')->name('all.prescriptions');
});
