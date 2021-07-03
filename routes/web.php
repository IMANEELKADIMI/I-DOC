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

/*Route::get('/', function () {
    return view('auth.login');
});*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['register' => true]);


Route::get('/admin_dashboard', 'AdminController@index')->name('admin');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lang/{locale}', 'HomeController@lang');


//Patients
Route::get('/admin_dashboard/patient/creat', 'PatientController@creat')->name('admin.patient.creat');
Route::post('/admin_dashboard/patient/creat', 'PatientController@stor')->name('admin.patient.stor');
Route::get('/patient/create', 'PatientController@create')->name('patient.create');
Route::post('/patient/create', 'PatientController@store')->name('patient.store');
Route::get('/patient/all', 'PatientController@all')->name('patient.all');
Route::get('/admin_dashboard/patient/al', 'PatientController@al')->name('admin.patient.al');
Route::get('/patient/view/{id}', 'PatientController@view')->where('id', '[0-9]+')->name('patient.view');
Route::get('/admin_dashboard/patient/vie/{id}', 'PatientController@vie')->where('id', '[0-9]+')->name('admin.patient.vie');
Route::get('/patient/edit/{id}', 'PatientController@edit')->where('id', '[0-9]+')->name('patient.edit');
Route::get('/admin_dashboard/patient/edi/{id}', 'PatientController@edi')->where('id', '[0-9]+')->name('admin.patient.edi');
Route::post('/patient/edit', 'PatientController@store_edit')->name('patient.store_edit');
Route::post('/admin_dashboard/patient/edi', 'PatientController@store_edi')->name('admin.patient.store_edi');
Route::get('/patient/delete/{id}','PatientController@destroy')->where('id', '[0-9]+');
Route::get('/admin_dashboard/patient/delet/{id}','PatientController@destro')->where('id', '[0-9]+');

//Doctor
Route::get('/doctor/edit/{id}', 'DoctorController@create')->where('id', '[0-9]+')->name('doctor.create');
Route::post('/doctor/create', 'DoctorController@store')->name('doctor.store');

//Appointments
Route::get('/appointment/create', 'AppointmentController@create')->name('appointment.create');
Route::get('/admin_dashboard/appointment/creat', 'AppointmentController@creat')->name('admin.appointment.creat');
Route::post('/appointment/store', 'AppointmentController@store')->name('appointment.store');
Route::post('/admin_dashboard/appointment/stor', 'AppointmentController@stor')->name('admin.appointment.stor');
Route::get('/appointment/all', 'AppointmentController@all')->name('appointment.all');
Route::get('/admin_dashboard/appointment/al', 'AppointmentController@al')->name('admin.appointment.al');
Route::get('/appointment/checkslots/{id}','AppointmentController@checkslots')->where('id', '[0-9]+');
Route::get('/appointment/delete/{id}','AppointmentController@destroy')->where('id', '[0-9]+');
Route::get('/admin_dashboard/appointment/delet/{id}','AppointmentController@destro')->where('id', '[0-9]+');
Route::post('/appointment/edit', 'AppointmentController@store_edit')->name('appointment.store_edit');

//Drugs
Route::get('/drug/create', 'DrugController@create')->name('drug.create');
Route::post('/drug/create', 'DrugController@store')->name('drug.store');
Route::get('/drug/edit/{id}', 'DrugController@edit')->where('id', '[0-9]+')->name('drug.edit');
Route::post('/drug/edit', 'DrugController@store_edit')->name('drug.store_edit');
Route::get('/drug/all', 'DrugController@all')->name('drug.all');
Route::get('/drug/delete/{id}','DrugController@destroy');


//Tests
Route::get('/test/create', 'TestController@create')->name('test.create');
Route::post('/test/create', 'TestController@store')->name('test.store');
Route::get('/test/edit/{id}', 'TestController@edit')->name('test.edit');
Route::post('/test/edit', 'TestController@store_edit')->name('test.store_edit');
Route::get('/test/all', 'TestController@all')->name('test.all');
Route::get('/test/delete/{id}', 'TestController@destroy')->where('id', '[0-9]+');

//Prescriptions
Route::get('/prescription/create', 'PrescriptionController@create')->name('prescription.create');
Route::post('/prescription/create', 'PrescriptionController@store')->name('prescription.store');
Route::get('/prescription/all', 'PrescriptionController@all')->name('prescription.all');
Route::get('/prescription/view/{id}', 'PrescriptionController@view')->where('id', '[0-9]+')->name('prescription.view');
Route::get('/prescription/pdf/{id}','PrescriptionController@pdf')->where('id', '[0-9]+');
Route::get('/prescription/delete/{id}','PrescriptionController@destroy');

//Billing
Route::get('/billing/create', 'BillingController@create')->name('billing.create');
Route::get('/admin_dashboard/billing/creat', 'BillingController@creat')->name('admin.billing.creat');
Route::post('/billing/create', 'BillingController@store')->name('billing.store');
Route::post('/admin_dashboard/billing/creat', 'BillingController@stor')->name('admin.billing.stor');
Route::get('/billing/all', 'BillingController@all')->name('billing.all');
Route::get('/admin_dashboard/billing/al', 'BillingController@al')->name('admin.billing.al');
Route::get('/billing/view/{id}', 'BillingController@view')->where('id', '[0-9]+')->name('billing.view');
Route::get('/admin_dashboard/billing/vie/{id}', 'BillingController@vie')->where('id', '[0-9]+')->name('admin.billing.vie');
Route::get('/billing/pdf/{id}','BillingController@pdf')->where('id', '[0-9]+');
Route::get('/billing/delete/{id}','BillingController@destroy');
Route::get('/admin_dashboard/billing/delet/{id}','BillingController@destro');
//Settings
/* I-DOC Settings */
Route::get('/settings/idoc_settings', 'SettingController@idoc_settings')->name('idoc_settings.edit');
Route::get('/admin_dashboard/settings/idoc_setting', 'SettingController@idoc_setting')->name('admin.idoc_setting.edit');
Route::post('/settings/idoc_settings', 'SettingController@idoc_settings_store')->name('idoc_settings.store');
Route::post('/admin_dashboard/settings/idoc_setting', 'SettingController@idoc_setting_stor')->name('admin.idoc_setting.stor');
/* Prescription Settings */
Route::get('/settings/prescription_settings', 'SettingController@prescription_settings')->name('prescription_settings.edit');
Route::post('/settings/prescription_settings', 'SettingController@prescription_settings_store')->name('prescription_settings.store');