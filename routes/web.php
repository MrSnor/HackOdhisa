<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\hospital\AuthController as HospitalAuthController;
use App\Http\Controllers\hospital\WeBController as HospitalWeBController;
use App\Http\Controllers\web\ProfileUpdate;
use App\Http\Controllers\web\WebController;

use Illuminate\Support\Facades\Route;

// Web Contrller
Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('web');
    Route::get('/home', 'home')->name('home');
    Route::get('/search', 'search');
    Route::get('/logout', 'logout')->name('logout');
});

// user Auth Contrller
Route::controller(AuthController::class)->group(function () {

    Route::get('/login', 'index')->name('register');
    Route::get('/verify', 'verifyPage')->name('verify');
    Route::post('/',  'create')->name('register');
    Route::post('/verify', 'verify')->name('verify');
    Route::get('/profile/next-step', 'nameUpdate')->name('update.name');
});

Route::get('/profile-update', [ProfileUpdate::class], 'update');

Route::controller(HospitalAuthController::class)->group(function () {
    Route::get('/hospital-login', 'login')->name('login');
    Route::get('/hospital/dashboard', 'home')->name('home.index');
    Route::get('hospital/add', 'index');
    Route::get('/hospital/verify', 'verify')->name('hospital.verify');
});
Route::controller(HospitalWeBController::class)->group(function () {

    Route::get('/booking', 'booking')->name('hospital.booking');
    Route::get('/bed-deatils', 'bed')->name('hospital.bed');
    Route::get('account', 'account')->name('hospital.profile');
});
