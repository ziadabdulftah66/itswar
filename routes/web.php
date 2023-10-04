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

Route::get('/', '\App\Http\Controllers\Front\PagesController@index')->name('home');
Route::get('/how-use', '\App\Http\Controllers\Front\PagesController@usageAgreement')->name('front.usageAgreement');
Route::get('/termsCondtions', '\App\Http\Controllers\Front\PagesController@termsCondtions')->name('front.termsCondtions');
Route::get('/contact_us', '\App\Http\Controllers\Front\Contact_UsController@index')->name('contact_us');
Route::post('/contact_us/store', '\App\Http\Controllers\Front\Contact_UsController@store_contact')->name('contact_us.store');
Route::get('/question', '\App\Http\Controllers\Front\PagesController@question')->name('question');
Route::get('/Itswar', '\App\Http\Controllers\Front\ItswarController@index')->name('Itswar');
Route::post('/removebg/{order}', '\App\Http\Controllers\ImageController@removebg');


