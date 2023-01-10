<?php

use App\Http\Controllers\Auth\Login2Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/custompagelogin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//  Start The Email Verification Notice
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
//  End The Email Verification Notice

//  Start Test multiple Auth
Route::get('showLogin2', [Login2Controller::class, 'showLogin2'])->name('showLogin2');
Route::post('postLogin2', [Login2Controller::class, 'postLogin2'])->name('postLogin2');
//  End Test multiple Auth