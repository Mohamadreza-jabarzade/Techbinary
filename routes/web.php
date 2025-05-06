<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

Route::view('/','index')->name('showHome');

Route::view('/login','auth.login')->name('showLogin');
Route::view('/register','auth.register')->name('showRegister');
Route::view('/forgot','auth.forgot')->name('showForgot');
Route::view('/forgot/email/check','auth.forgotEmail')->name('showForgotEmailCheck');
Route::view('/forgot/new','auth.forgotNew')->name('showForgotNew');


Route::post('/register/email/check',[AuthController::class, 'registerEmailCheck'])->name('RegisterEmailCheck');
Route::get('/register/email/check',[AuthController::class, 'showRegisterEmailCheck'])->name('showRegisterEmailCheck');
Route::post('/register/create',[AuthController::class, 'verifyCode'])->name('verifyCode');
Route::get('/register/account',[AuthController::class, 'showCreateAccount'])->name('showCreateAccount');
Route::post('/register/save/account',[AuthController::class, 'createAccount'])->name('CreateAccount');

Route::get('/register/verify', [AuthController::class, 'showVerifyForm'])->name('showVerifyForm');
Route::get('/register/verify/resend', [AuthController::class, 'resendVerifyCode'])->name('resendVerifyCode');

Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/load/posts', [PostController::class, 'loadPosts'])->name('loadPosts');
Route::POST('/post/like', [PostController::class, 'likePost'])->name('likePost');

Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'showDashboard')->name('showDashboard');
            Route::get('/Categories', 'showCategories')->name('showCategories');
            Route::get('/Posts', 'showPosts')->name('showPosts');
            Route::get('/Comments', 'showComments')->name('showComments');
            Route::get('/Users', 'showUsers')->name('showUsers');
        });
});


