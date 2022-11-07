<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PropertyController;

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

	return view('backend.layout.dashboard.index');
});


// ********************    Authentication MODULE START ********************************


Route::get( '/login', [ AuthenticationController::class, 'login'] )->name('login_form');

Route::get( '/forgoten/password', [ AuthenticationController::class, 'forgoten'] )->name('forgot_form');

Route::get( '/verify/otp', [ AuthenticationController::class, 'otp_verify_form'] )->name('otp_verify_form');

Route::post( '/verify/otp/post', [ AuthenticationController::class, 'otp_verify'] )->name('otp_verify');



Route::post( '/forgoten/password/send_otp', [ AuthenticationController::class, 'forgot_password_sent_otp'] )->name('forgot_password_sent_otp');


Route::post( '/login/check', [ AuthenticationController::class, 'loginCheck'] )->name('login_check');

Route::get( '/logout', [ AuthenticationController::class, 'logout'] )->name('logout');

Route::get( '/profile', [ AuthenticationController::class, 'profile'] )->name('profile');

Route::get( '/settings', [ AuthenticationController::class, 'settings'] )->name('settings');

Route::post( '/profile/update/post', [ AuthenticationController::class, 'profile_update'] )->name('profile_update_post');

Route::post( '/profile/setting/phone/update/post', [ AuthenticationController::class, 'profile_setting_update_phone'] )->name('profile_setting_update_phone');

Route::post( '/profile/setting/password/update/post', [ AuthenticationController::class, 'profile_setting_update_password'] )->name('profile_setting_update_password');




// ********************    Authentication MODULE End ********************************




// ********************    PropertyController MODULE START ********************************

Route::get( '/property/create', [ PropertyController::class, 'create'] )->name('property_registration_form');

Route::post( '/property/create/post', [ PropertyController::class, 'store'] )->name('property_registration_save');

Route::get( '/property/list', [ PropertyController::class, 'index'] )->name('property_list');

Route::post( '/property/update/post/{id}', [ PropertyController::class, 'update'] )->name('property_update_save');

Route::get( '/property/show/{id}', [ PropertyController::class, 'show'] )->name('property_show');

Route::get( '/property/edit/{id}', [ PropertyController::class, 'edit'] )->name('property_edit');

// ********************    PropertyController MODULE End ********************************

