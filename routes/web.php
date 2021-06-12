<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostController;

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
    return redirect()->route('login');
});

Route::get('register-step2', [App\Http\Controllers\Auth\RegisterStep2Controller::class, 'index']);

Route::post('register-step2', [App\Http\Controllers\Auth\RegisterStep2Controller::class, 'postForm'])->name('register.step2');

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/otp', [App\Http\Controllers\Auth\RegisterStep2Controller::class, 'otp'])->name('otp');
Route::post('otp-validate', [App\Http\Controllers\Auth\RegisterStep2Controller::class, 'verifyOtp'])->name('verifyOtp');
Route::get('resend-otp', [App\Http\Controllers\Auth\RegisterStep2Controller::class, 'resendOtp'])->name( 'resendOtp');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::prefix('admin')->group(function () {
    Route::resource( 'jobs', JobPostController::class);
    Route::post('jobs/{job}', [JobPostController::class, 'update']);


});
