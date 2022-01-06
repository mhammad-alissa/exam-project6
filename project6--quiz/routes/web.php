<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\PublicPagesController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/home", [PublicPagesController::class,'index'])->name('publicIndex');



Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    // Route::get('/', 'Auth\AdminLoginController@index')->name('admin.dashboard');
    // Route::get('/manage_categories', [App\Http\Controllers\CategoryController::class, 'index']);
    // Route::resource('manage_admins', 'AdminController');
    // Route::resource('manage_users', 'UserController');
    // Route::resource('manage_categories', 'CategoryController');
    // Route::resource('manage_exams', 'ExamController');
    Route::get('a', function () {
        return 'welcome';
    });

   }) ;




//    Route::name('admin.')->prefix('admin')->middleware(['auth'])->group(function () {
// 	// Route::resource("manage_admins", App\Http\Controllers\Admin::class);
    // Route::resource("manage_categories", App\Http\Controllers\CategoryController::class);



// });


Route::group([
    'prefix' => 'admin'], function () {
Route::resource('manage_admins', 'AdminController');
Route::resource('manage_users', 'UserController');
Route::resource('manage_categories', 'CategoryController');
Route::resource('manage_exams', 'ExamController');
// Route::resource("manage_category", [App\Http\Controllers\CategoryController::class,'index']);

	// Route::resource("manage_category", App\Http\Controllers\Admin::class);
});





Route::get('/a', function () {
    return 'welcome';
});
