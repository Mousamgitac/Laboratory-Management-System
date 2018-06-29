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
Route::auth();
Route::get('/logout','Auth\LoginController@logout' );
Route::get('blog/{slug}',['as' => 'blog.single','uses' => 'blogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog',['as' => 'blog.index','uses' => 'blogController@getIndex'])->where('slug','[\w\d\-\_]+');
Route::get('contact','pagesController@getContact');
Route::post('contact','pagesController@postContact');
Route::get('about','pagesController@getAbout');
Route::get('/','pagesController@getIndex');
Route::resource('posts','postController');
Route::resource('categories','categoryController');
Route::resource('tags','tagController');
    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
