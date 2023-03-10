<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function(){
   return view('admin.pages.dashboard');
})->middleware('auth')->name('dashboard');

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    
    //admin login
    Route::match(['get','post'],'login', 'AdminController@login');

    Route::group(['middleware'=>'admin'],function(){
         //admin dashboard
         Route::get('dashboard','AdminController@dashboard');

         //update admin password
         Route::match(['get','post'],'update-admin-password', 'AdminController@updateAdminPassword');

         //check admin password
         Route::post('check-admin-password', 'AdminController@checkAdminPassword');

         //update admin details
         Route::match(['get','post'],'update-admin-details', 'AdminController@updateAdminDetails');

         //update admin details
         Route::match(['get','post'],'update-vendor-details/{slug}', 'AdminController@updateVendorDetails');

         //View Admins / Subadmins / Vendors
         Route::get('admins/{type?}','AdminController@admins');

         //  View Vendor Details
         Route::get('view-vendor-details/{id}','AdminController@viewVendorDetails');

         //  Update Admin Status
         Route::post('update-admin-status','AdminController@updateAdminStatus');

         // Sections
         Route::get('sections','SectionController@sections');
         Route::post('update-section-status','SectionController@updateSectionStatus'); //  Update Section Status
         Route::get('sections/{id}/delete','SectionController@delete');
         Route::match(['get','post'],'add-edit-section/{id?}', 'SectionController@addEditSection');
         
         // Categories  
         Route::get('categories','CategoryController@categories');
         Route::post('update-category-status','CategoryController@updateCategoryStatus');//  Update Category Status
         Route::get('categories/{id}/delete','CategoryController@delete');

         //admin logout
         Route::get('logout','AdminController@logout');

    });
});