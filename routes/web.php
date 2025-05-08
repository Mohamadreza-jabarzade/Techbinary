<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class,'showHome'])->name('showHome');

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
Route::POST('/like/post', [LikeController::class, 'postLike'])->name('postLike');

Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('', 'showDashboard');
            Route::get('/dashboard', 'showDashboard')->name('showDashboard');
            Route::get('/categories', 'showCategories')->name('showCategories');
            Route::get('/categories/manage', 'showCategoryManage')->name('showCategoryManage');
            Route::get('/posts', 'showPosts')->name('showPosts');
            Route::get('/posts/new', 'showNewPost')->name('showNewPost');
            Route::get('/comments', 'showComments')->name('showComments');
            Route::get('/users', 'showUsers')->name('showUsers');
        });
});



