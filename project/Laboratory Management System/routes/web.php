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
    return view('home');
});
Route::get('/welcome', function () {
    return view('pages.welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/main', function () {
    return view('main');
});
Route::get('/login', function () {
    return view('login');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@index')->name('home');
Route::resource('patientRegistration','patientRegistrationController');
Route::resource('menu','menuController');
Route::resource('module','LabModuleController');
Route::resource('userInfo','userInfoController');
Route::get('/findDistrictName','patientRegistrationController@findDistrictName');
Route::get('/findLocalLevelName','patientRegistrationController@findLocalLevelName');
Route::get('search','patientRegistrationController@search');
Route::get('searchdate','patientRegistrationController@searchdate');
Route::resource('state','StateController');


