<?php
use App\Http\AdminController;
use App\Http\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {return view('welcome');});

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blogs',[App\Http\Controllers\BlogController::class,'index'])->name('index');

Route::get('/profile','App\Http\Controllers\ProfileController@index')->name('profile');
Route::get('/profile/update/{id}','App\Http\Controllers\ProfileController@update')->name('profile.update');


Route::get('edit/{id}',[App\Http\Controllers\BlogController::class,'edit'])->name('edit');
Route::get('/create',[App\Http\Controllers\BlogController::class,'create'])->name('create');
Route::get('destroy/{id}',[App\Http\Controllers\BlogController::class,'destroy'])->name('destroy');
Route::get('store',[App\Http\Controllers\BlogController::class,'store'])->name('store');
Route::get('update/{id}',[App\Http\Controllers\BlogController::class,'update'])->name('update');

//Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard');

Route::group(['prefix'=>'admin','middleware'=>'isAdmin','auth'],function(){
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('admin.settings');
});

Route::group(['prefix'=>'user','middleware'=>'isUser','auth'],function(){
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard');
   Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
   Route::get('/settings', [App\Http\Controllers\UserController::class, 'settings'])->name('user.settings');
});