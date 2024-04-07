<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeCpntroller;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home.welcome');

//.........Admin Route...................

Route::resource('user',UserController::class);

Route::resource('admin',AdminController::class);


// //search a Employee
 Route::post('/admin/search',[AdminController::class,'showMulti'])->name('admin.showMulti');


//......................login/logout/home route............
Auth::routes();
//home page
Route::get('/home', [HomeController::class, 'index'])->name('home');
//logout rout
Route::post('/logout', [HomeController::class, 'logout'])->name('home.logout');
//login rout
Route::post('/home/checklogin', [HomeController::class, 'login'])->name('home.login')->middleware('hasPermission');
