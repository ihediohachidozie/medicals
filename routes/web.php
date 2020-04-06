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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/hospital', 'HospitalController@index');
Route::get('/practitioner', 'PractitionerController@index');

//Route for patient's activity
Route::prefix('patient')->group(function() {
    Route::get('/login', 'Auth\PatientLoginController@showLoginForm')->name('patient.login');
    Route::post('/login', 'Auth\PatientLoginController@login')->name('patient.login.submit');
    Route::get('/register', 'Auth\PatientRegisterController@showRegistrationForm')->name('patient.register');
    Route::post('/register', 'Auth\PatientRegisterController@register')->name('patient.register.submit');
    // route for personal profile ...
    Route::get('/profile', 'PatientController@patientProfile')->name('patient.profile');
    Route::post('/profile', 'PatientController@store')->name('patient.profile.store');

    //route for booking appointment ...
    Route::get('/appointment','PatientController@booking')->name('patient.appointment');
    Route::get('/hospital/{id}','PatientController@getDoctors')->name('patient.hospital');
    Route::get('/doctor/{id}', 'PatientController@bookDoctor')->name('patient.doctor');

    // route for view medical history...
    Route::get('/medhistory', 'PatientController@getHistory')->name('patient.history');

    // route for view medical records...
     Route::get('/history/{id}', 'PatientController@medHistory')->name('patient.medical.history');

    // route for dependants ....
    Route::get('/dependent', 'DependentController@index')->name('dependent.index');
    Route::post('/dependent', 'DependentController@store')->name('dependent.store');
    Route::get('/dependent/create', 'DependentController@create')->name('dependent.create');
    Route::delete('/dependent/{id}', 'DependentController@destroy')->name('dependent.destroy');
    Route::put('/dependent/{dependent}', 'DependentController@update')->name('dependent.update');
    Route::get('/dependent/{dependent}/edit', 'DependentController@edit')->name('dependent.edit');

    
    Route::get('/', 'PatientController@index')->name('patient.dashboard');
    
    Route::get('/logout', 'Auth\PatientLoginController@logout')->name('patient.logout');
});

//Route for hospital's activity
Route::prefix('hospital')->group(function() {
    Route::get('/login', 'Auth\HospitalLoginController@showLoginForm')->name('hospital.login');
    Route::post('/login', 'Auth\HospitalLoginController@login')->name('hospital.login.submit');
    Route::get('/register', 'Auth\HospitalRegisterController@showRegistrationForm')->name('hospital.register');
    Route::post('/register', 'Auth\HospitalRegisterController@register')->name('hospital.register.submit');
    // route for adding practitioners ...
    Route::get('/practitioner/add', 'HospitalController@showAddPractitionerForm')->name('hospital.add.practitioner');
    Route::get('/practitioner/{id}/edit', 'HospitalController@showEditPractitionerForm')->name('hospital.edit.practitioner');
    Route::get('/practitioners', 'HospitalController@showListPractitioner')->name('hospital.practitioners');
    Route::post('/practitioner/add', 'HospitalController@store')->name('hospital.store.practitioner');
    Route::put('/practitioner/{id}', 'HospitalController@update')->name('hospital.update.practitioner');
    Route::delete('/practitioner/{id}', 'HospitalController@destroy')->name('hospital.delete.practitioner');
    

    Route::get('/', 'HospitalController@index')->name('hospital.dashboard');
    Route::get('/logout', 'Auth\HospitalLoginController@logout')->name('hospital.logout');
});

//Route for practitioner's activity
Route::prefix('practitioner')->group(function() {
    Route::get('/login', 'Auth\PractitionerLoginController@showLoginForm')->name('practitioner.login');
    Route::post('/login', 'Auth\PractitionerLoginController@login')->name('practitioner.login.submit');
    Route::get('/register', 'Auth\PractitionerRegisterController@showRegistrationForm')->name('practitioner.register');
    Route::post('/register', 'Auth\PractitionerRegisterController@register')->name('practitioner.register.submit');
    
    // route for administering patients ...
    Route::get('/bookings', 'ConsultancyController@index')->name('patients.bookings');
    Route::get('/admission/{consultancy}/edit', 'ConsultancyController@edit')->name('patients.admission');
    Route::put('/admission/{consultancy}', 'ConsultancyController@update')->name('patients.admission.update');
    Route::get('/consult/create', 'ConsultancyController@create')->name('patients.consult');
    Route::get('/admission/{consultancy}', 'ConsultancyController@show')->name('patients.doctor.consult');
    Route::get('/laboratory/{consultancy}', 'ConsultancyController@lab')->name('patients.lab');
    Route::get('/pharmacy/{consultancy}', 'ConsultancyController@pharm')->name('patients.pharm');
    Route::get('/consult/{consultancy}', 'ConsultancyController@destroy')->name('patient.discharge');

    // Laboratory routes
    Route::get('Laboratory/{id}/edit','LaboratoryController@edit')->name('test.patient');
    Route::put('Laboratory/{id}','LaboratoryController@update')->name('lab.test.submit');
    Route::get('Laboratory/tests', 'LaboratoryController@index')->name('lab.test.requests');
    
    // Pharmacy routes
    Route::get('Pharmacy/{id}/edit','PharmacyController@edit')->name('pharm.drugs.request');
    Route::put('Pharmacy/{id}','PharmacyController@update')->name('pharm.drugs.submit');

    Route::get('Pharmacy/prescriptions', 'PharmacyController@index')->name('pharm.prescriptions');

    // route for view medical history...
    Route::get('/medhistory', 'ConsultancyController@history')->name('practitioner.patient.history');

    // route for view medical records...
     Route::get('/history/{id}', 'ConsultancyController@viewHistory')->name('practitioner.medhistory');


    Route::get('/', 'PractitionerController@index')->name('practitioner.dashboard');
    Route::get('/logout', 'Auth\PractitionerLoginController@logout')->name('practitioner.logout');
});