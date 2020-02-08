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

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
   Route::resource('users','UsersController');
   Route::get('msin','MainController@index')->name('main');
    Route::resource('hospitals','HospitalsController');
    Route::resource('specialties','SpecialtiesController');
    Route::get('specialtiesDelete/{id}','SpecialtiesController@delete')->name('specialties.delete');
    Route::post('specialtiesDeleted/{id}','SpecialtiesController@deleted')->name('specialties.deleted');
    Route::get('hospitalDelete/{id}','HospitalsController@delete')->name('hospitals.delete');
    Route::post('hospitalDeleted/{id}','HospitalsController@deleted')->name('hospitals.deleted');
});