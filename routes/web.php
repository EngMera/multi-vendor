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
    
    Route::match(['get','post'],'login', 'AdminController@login');

    Route::group(['middleware'=>'admin'],function(){
         Route::get('dashboard','AdminController@dashboard');
         Route::get('logout','AdminController@logout');

    });
});