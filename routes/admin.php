<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

############################# Admin Route ###########################################
Route::group(['middleware' => 'guest:admin','prefix'=>'cp_admins'],function (){
    Route::get('login', '\App\Http\Controllers\Dashboard\AuthController@login')->name('login.admin');
    Route::post('postuser', '\App\Http\Controllers\Dashboard\AuthController@postlogin')->name('admin.login');
});
########################### Admin after auth ######################################
Route::group(['prefix'=>'cp_admins','middleware'=>'auth:admin'],function (){
    Route::get('/', '\App\Http\Controllers\Dashboard\AdminDashboard@index')->name('admin_dashboard');//home of dashboard
    Route::get('logout', '\App\Http\Controllers\Dashboard\AuthController@logout')->name('admin.logout');//logout
    Route::get('MarkAsRead_all','\App\Http\Controllers\Dashboard\AdminDashboard@MarkAsRead_all')->name('MarkAsRead_all');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('edit', '\App\Http\Controllers\Dashboard\ProfileController@editProfile')->name('edit.profile');
        Route::post('update', '\App\Http\Controllers\Dashboard\ProfileController@updateprofile')->name('update.profile');
    });

    Route::resource('settings', \App\Http\Controllers\Dashboard\GeneralSettingController::class);
    Route::resource('SocialSettings', \App\Http\Controllers\Dashboard\SocialSettingController::class);
    ################################
    Route::resource('videos', \App\Http\Controllers\Dashboard\VideoController::class)->middleware([]);
    ###############contact us ######################33
    Route::get('contact_us', '\App\Http\Controllers\Dashboard\Contact_UsController@index')->name('contact_us.index');
    Route::get('contact_us/show/{id}/{not_id?}', '\App\Http\Controllers\Dashboard\Contact_UsController@showContact')->name('contact_us.show');
    #######questions page ###########################
    ################################## PhotoTypes of Dashboard ######################################
    Route::group(['prefix' => 'photoType'  ], function () {
        Route::get('/', '\App\Http\Controllers\Dashboard\photoTypeController@index')->name('photoType.index');
        Route::get('/create', '\App\Http\Controllers\Dashboard\photoTypeController@create')->name('photoType.create');
        Route::post('/store', '\App\Http\Controllers\Dashboard\photoTypeController@store')->name('photoType.store');
        Route::get('/edit/{id}', '\App\Http\Controllers\Dashboard\photoTypeController@edit') ->name('photoType.edit') ;
        Route::post('update/{id}', '\App\Http\Controllers\Dashboard\photoTypeController@update')->name('photoType.update');
        Route::get('/delete/{id}', '\App\Http\Controllers\Dashboard\photoTypeController@destroy') ->name('photoType.destroy') ;
    });
    Route::group(['prefix' => 'orders'  ], function () {
        Route::get('/', '\App\Http\Controllers\Dashboard\OrderController@index')->name('orders.index');
        Route::get('/details/{id}', '\App\Http\Controllers\Dashboard\OrderController@details') ->name('orders.edit') ;
        Route::get('/delete/{id}', '\App\Http\Controllers\Dashboard\OrderController@destroy') ->name('orders.destroy') ;
    });
    ################################## payments ######################################
    Route::group(['prefix' => 'payments'], function () {
        Route::get('/{not_id?}', '\App\Http\Controllers\Dashboard\PaymentController@index')->name('Payment.index');
        Route::Delete('/delete/{id}', '\App\Http\Controllers\Dashboard\PaymentController@destroy') ->name('Payment.destroy') ;


    });

    Route::get('/pages', '\App\Http\Controllers\Dashboard\PagesController@index')->name('pages.index');
    Route::get('pages/home_page', '\App\Http\Controllers\Dashboard\HomePageController@edit')->name('home.edit');
    Route::put('pages/home_page/update/1', '\App\Http\Controllers\Dashboard\HomePageController@update')->name('home.update');
    Route::get('pages/mistakes', '\App\Http\Controllers\Dashboard\PublicMistakeController@edit')->name('mistake.edit');
    Route::put('pages/mistakes/update/1', '\App\Http\Controllers\Dashboard\PublicMistakeController@update')->name('mistake.update');
    Route::get('pages/steps', '\App\Http\Controllers\Dashboard\PhotoStepController@edit')->name('steps.edit');
    Route::put('pages/steps/update/{id}', '\App\Http\Controllers\Dashboard\PhotoStepController@update')->name('steps.update');
    Route::get('pages/who_page', '\App\Http\Controllers\Dashboard\WhoPageController@edit')->name('who.edit');
    Route::put('pages/who_page/update', '\App\Http\Controllers\Dashboard\WhoPageController@update')->name('who.update');
    Route::get('pages/questions', '\App\Http\Controllers\Dashboard\QuestionController@create')->name('Questions.create');
    Route::post('pages/questions/store', '\App\Http\Controllers\Dashboard\QuestionController@store')->name('Questions.store');
    Route::post('pages/questions/update/{id}', '\App\Http\Controllers\Dashboard\QuestionController@update')->name('Questions.update');
    Route::get('pages/terms_page', '\App\Http\Controllers\Dashboard\TermsPageController@edit')->name('terms.edit');
    Route::put('pages/terms_page/update', '\App\Http\Controllers\Dashboard\TermsPageController@update')->name('terms.update');
});
