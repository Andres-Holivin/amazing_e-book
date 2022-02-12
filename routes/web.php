<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EBookController;
use App\Http\Controllers\OrderController;
use App\Models\Account;
use App\Models\EBook;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

if (file_exists(app_path('Http/Controllers/LocalizationController.php')))
{
    Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class , 'lang']);
}

Route::get('/', [AccountController::class,'homePage'])->middleware('guest');
Route::get('/Login', [AccountController::class,'loginPage'])->name('login')->middleware('guest');
Route::get('/Register', [AccountController::class,'registerPage'])->middleware('guest');
Route::get('/Logout', [AccountController::class,'logout'])->middleware('auth');
Route::get('/home', [EBookController::class,'home'])->middleware('auth');
Route::get('/book/detail/{id}', [EBookController::class,'detail'])->middleware('auth');
Route::get('/rent/{id}', [OrderController::class,'rent'])->middleware('auth');
Route::get('/cart', [OrderController::class,'cart'])->middleware('auth');
Route::get('/cart/delete/{id}', [OrderController::class,'delete'])->middleware('auth');
Route::get('/cart/submit', [OrderController::class,'submit'])->middleware('auth');
Route::get('/profile', [AccountController::class,'profile'])->middleware('auth');
Route::get('/account/maintenance', [AccountController::class,'maintenance'])->middleware('is_admin');
Route::get('/profile/update/role/{id}', [AccountController::class,'updateRolePage'])->middleware('is_admin');
Route::get('/profile/delete/{id}', [AccountController::class,'deleteUserPage'])->middleware('is_admin');

Route::post('/Register', [AccountController::class,'insertUser'])->middleware('guest');
Route::post('/Login', [AccountController::class,'checkUser'])->middleware('guest');
Route::post('/profile/update/{id}', [AccountController::class,'updateProfile'])->middleware('auth');
Route::post('/role/update/{id}', [AccountController::class,'updateRole'])->middleware('is_admin');

