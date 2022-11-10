<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\OrganizationSettingController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyUnitController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\PaymentController;

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

Route::get( '/', [ PaymentController::class, 'create'] );



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


Route::get( '/organization/user/delete/{id}', [ AuthenticationController::class, 'destroy'] )->name('organization_user_delete');



// ********************    Authentication MODULE End ********************************



// ********************    PropertyController MODULE START ********************************

Route::get( '/property/create', [ PropertyController::class, 'create'] )->name('property_add_form');

Route::post( '/property/create/post', [ PropertyController::class, 'store'] )->name('property_add_form_save');

Route::get( '/property/list', [ PropertyController::class, 'index'] )->name('property_list');

Route::post( '/property/update/post/{id}', [ PropertyController::class, 'update'] )->name('property_update_save');

Route::get( '/property/show/{id}', [ PropertyController::class, 'show'] )->name('property_show');

Route::get( '/property/edit/{id}', [ PropertyController::class, 'edit'] )->name('property_edit');

// ********************    PropertyController MODULE End ********************************



// ********************    PropertyUnitController MODULE START ********************************

Route::get( '/property_unit/create/{id}', [ PropertyUnitController::class, 'create'] )->name('property_unit_add_form');

Route::post( '/property_unit/create/post', [ PropertyUnitController::class, 'store'] )->name('property_unit_add_form_save');

Route::get( '/property_unit/list', [ PropertyUnitController::class, 'index'] )->name('property_unit_list');

Route::post( '/property_unit/update/post/{id}', [ PropertyUnitController::class, 'update'] )->name('property_unit_update_save');

Route::get( '/property_unit/show/{id}', [ PropertyUnitController::class, 'show'] )->name('property_unit_show');

Route::get( '/property_unit/edit/{id}', [ PropertyUnitController::class, 'edit'] )->name('property_unit_edit');

// ********************    PropertyUnitController MODULE End ********************************



// ********************    TenantController MODULE START ********************************

Route::get( '/tenant/create', [ TenantController::class, 'create'] )->name('tenant_add_form');

Route::post( '/tenant/create/post', [ TenantController::class, 'store'] )->name('tenant_add_form_save');

Route::get( '/tenant/list', [ TenantController::class, 'index'] )->name('tenant_list');

Route::post( '/tenant/update/post/{id}', [ TenantController::class, 'update'] )->name('tenant_update_save');

Route::get( '/tenant/show/{id}', [ TenantController::class, 'show'] )->name('tenant_show');

Route::get( '/tenant/edit/{id}', [ TenantController::class, 'edit'] )->name('tenant_edit');

// ********************    TenantController MODULE End ********************************



// ********************    LeaseController MODULE START ********************************

Route::get( '/lease/create', [ LeaseController::class, 'create'] )->name('lease_add_form');

Route::post( '/lease/create/post', [ LeaseController::class, 'store'] )->name('lease_add_form_save');

Route::get( '/lease/list', [ LeaseController::class, 'index'] )->name('lease_list');

Route::get( '/property/unit/list/{id}', [ LeaseController::class, 'property_unit_list'] );

Route::post( '/lease/update/post/{id}', [ LeaseController::class, 'update'] )->name('lease_update_save');

Route::get( '/lease/show/{id}', [ LeaseController::class, 'show'] )->name('lease_show');

Route::get( '/lease/edit/{id}', [ LeaseController::class, 'edit'] )->name('lease_edit');

// ********************    PropertyCoLeaseControllerntroller MODULE End ********************************



// ********************    PaymentController MODULE START ********************************

Route::get( '/payment/collect', [ PaymentController::class, 'create'] )->name('payment_add_form');

Route::post( '/payment/collect/post', [ PaymentController::class, 'store'] )->name('payment_add_form_save');

Route::get( '/payment/list', [ PaymentController::class, 'index'] )->name('payment_list');

Route::get( '/payment/list/pending', [ PaymentController::class, 'pending_index'] )->name('payment_list_pending');

Route::get( '/payment/list/recorded', [ PaymentController::class, 'recorded_index'] )->name('payment_list_recorded');

Route::post( '/payment/update/post/{id}', [ PaymentController::class, 'update'] )->name('payment_update_save');

Route::get( '/payment/show/{id}', [ PaymentController::class, 'show'] )->name('payment_show');

Route::get( '/payment/edit/{id}', [ PaymentController::class, 'edit'] )->name('payment_edit');


Route::get( '/get/lease_by_tenant_id/{id}', [ PaymentController::class, 'lease_by_tenant_id'] );

Route::get( '/payment/filter', [ PaymentController::class, 'payment_filter'] )->name('payment_filter');


Route::GET( 'payment/change/pending/{id}', [ PaymentController::class,'statusRecorded' ] )->name('pending_status_change');
 Route::GET( 'payment/change/recorded/{id}', [ PaymentController::class,'statusDeposited' ] )->name('recorded_status_change');
 Route::GET( 'payments/mark/all/deposited', [ PaymentController::class,'mark_all_deposited' ] )->name('all_recorded_status_change');


// ********************    PaymentController0 MODULE End ********************************



// ********************    OrganizationSetting MODULE START ********************************
Route::get( '/organization/info', [ OrganizationSettingController::class, 'index'] )->name('organization_info');
Route::post( '/organization/info/updated', [ OrganizationSettingController::class, 'update'] )->name('organization_info_update');

Route::get( '/organization/add/user', [ OrganizationSettingController::class, 'add_new_user'] )->name('add_new_user');
Route::post( '/organization/add/user/post', [ OrganizationSettingController::class, 'add_new_user_post'] )->name('add_new_user_post');

Route::get( '/organization/user/list', [ OrganizationSettingController::class, 'user_list'] )->name('user_list');
Route::get( '/organization/user/edit/{id}', [ OrganizationSettingController::class, 'organization_user_edit'] )->name('organization_user_edit');
Route::post( '/organization/user/update/{id}', [ OrganizationSettingController::class, 'organization_update_user'] )->name('organization_update_user');




// ********************    OrganizationSetting MODULE END ********************************