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


/*
Route::get('/hello', function () {
    //return view('welcome');
    return '<h1>Hello World</h1>';
});

Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'This is user '.$name. 'with an id of '.$id;
});
*/

Route::get('/', 'PagesController@index');


Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');
Route::get('/contact','PagesController@contact');
Route::get('/portal','PagesController@portal');
Route::get('/complete-profile','PagesController@completeProfile')->name('complete-profile');
Route::post('/complete-profile/patient','DashboardController@patientProfile')->name('patient-profile');
Route::post('/complete-profile/doctor','DashboardController@doctorProfile')->name('doctor-profile');
Route::post('/complete-profile/admin','DashboardController@adminProfile')->name('admin-profile');
Route::get('/requestmedical','MapController@requestMedical')->name('requestmedical');
Route::get('/requestmedical/list','RequestController@requestMedicalList')->name('request-medical.list');
Route::get('/requestmedicine/list','RequestController@requestMedicineList')->name('request-medicine.list');
Route::get('/requestmedical/index/{id}','MapController@requestMedicalIndex')->name('requestmedical.index');
Route::post('/requestmedical/store','MapController@requestMedicalStore')->name('requestmedical.store');
Route::get('/samplecollection','PagesController@samplecollection');
Route::post('/samplecollection/store', 'RequestController@sampleRequest')->name('sample-request.store');
Route::get('/samplecollection/list', 'RequestController@requestSampleList')->name('request-sample.list');
Route::get('/medicinedelivery','PagesController@medicinedelivery');
Route::get('/doctorportal','PagesController@doctorportal');
Route::get('/adminportal','PagesController@adminportal');

//Route::get('/viewinfo','PagesController@viewinfo');

//Route::get('/viewinfo','PatientInfoController@viewinfo');
//Route::post('/viewinfo','PatientInfoController@store');
//Route::get('/viewinfo','PatientInfoController@create');



//Route::resource('patient_info','PatientInfoController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/api/map-marker', 'Api\ApiRestaurantController@mapMarker');