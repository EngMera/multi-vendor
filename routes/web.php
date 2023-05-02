<?php

use App\Models\Category;
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
Route::namespace('App\Http\Controllers\Front')->group(function(){
    Route::get('/','IndexController@index');

    // products
    Route::get('products/{id?}','ProductController@products');

    $catUrls = Category::select('url')->where('status',1)->get()->pluck('url')->toArray();
    // dd($catUrls);

    foreach ($catUrls as $key => $url) {
        Route::get('/'.$url,'ProductController@listing');

    }


});

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
         Route::match(['get','post'],'add-edit-category/{id?}', 'CategoryController@addEditCategory');
         Route::get('append-categories-level','CategoryController@appendCategoriesLevel');

         //  Brands
         Route::get('brands','BrandController@brands');
         Route::post('update-brand-status','BrandController@updateBrandStatus');//  Update Brand Status
         Route::get('brands/{id}/delete','BrandController@delete');
         Route::match(['get','post'],'add-edit-brand/{id?}', 'BrandController@addEditBrand');

         //  Products
         Route::get('products','ProductController@products');
         Route::post('update-product-status','ProductController@updateProductStatus');//  Update Product Status
         Route::get('products/{id}/delete','ProductController@delete');
         Route::match(['get','post'],'add-edit-product/{id?}', 'ProductController@addEditProduct');
         Route::get('delete-product-image/{id}','ProductController@deleteProductImage');
         Route::match(['get','post'],'add-edit-attributes/{id}', 'ProductController@addEditAttributes');
         Route::post('update-attribute-status','ProductController@updateAttributeStatus');//  Update Product Status
         Route::get('attribute/{id}/delete','ProductController@deleteAttribute');
         Route::post('edit-attribute/{id}','ProductController@editAttribute');
         Route::match(['get','post'],'add-images/{id}', 'ProductController@addImages');
         Route::get('delete-image/{id}','ProductController@deleteImage');

         //  Banners
         Route::get('banners','BannerController@banners');
         Route::post('update-banner-status','BannerController@updateBannerStatus');//  Update Banner Status
         Route::get('banners/{id}/delete','BannerController@delete');
         Route::match(['get','post'],'add-edit-banner/{id?}', 'BannerController@addEditBanner');



         //admin logout
         Route::get('logout','AdminController@logout');

    });
});


