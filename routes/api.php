<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/login', 'AuthControllerApi@login')->name('login');
    Route::post('register', 'AuthControllerApi@register');

    Route::post('logout', 'AuthControllerApi@logout');
    Route::resource('profile', 'ProfileApiController');
    Route::put('/fcm', 'ProfileApiController@updateFCM')->name('user.update');
    Route::get('/check_user', 'ProfileApiController@checkUser')->name('user.check');
});


Route::resource('medical_fields', 'MedicalFieldAPIController');

Route::resource('medical_specialties', 'MedicalSpecialtyAPIController');

Route::resource('employs', 'EmployAPIController');

Route::resource('accept_request_specialists', 'AcceptRequestSpecialistsAPIController');
Route::resource('wallets', 'WalletAPIController');
//Route::resource('my_wallets', 'WalletAPIController');

Route::resource('request_specialists', 'RequestSpecialistsAPIController');
Route::get('request_specialists_admin_history', 'RequestSpecialistsAPIController@adminHistory');
Route::get('request_specialists_doctor_history', 'RequestSpecialistsAPIController@doctorHistory');
Route::get('request_specialists_history', 'RequestSpecialistsAPIController@history');
Route::get('search_request_specialists/{search}', 'RequestSpecialistsAPIController@search');

Route::get('acceptRequestByAdmin/{id}', 'AcceptRequestSpecialistsAPIController@acceptRequestByAdmin');
Route::get('acceptRequestByUser/{id}', 'AcceptRequestSpecialistsAPIController@acceptRequestByUser');
Route::get('cancelRequestByAdmin/{id}', 'AcceptRequestSpecialistsAPIController@cancelRequestByAdmin');
Route::get('cancelRequestByUser/{id}', 'AcceptRequestSpecialistsAPIController@cancelRequestByUser');
Route::post('acceptRequestAndDone/{id}', 'AcceptRequestSpecialistsAPIController@acceptRequestAndDone');

Route::resource('emergency_serviced', 'EmergencyServicedAPIController');
Route::get('emergency_serviced_admin_history', 'EmergencyServicedAPIController@adminHistory');

Route::resource('ambulances', 'AmbulanceAPIController');



Route::resource('pharmacies', 'PharmacyAPIController');