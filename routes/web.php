<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/','index')->name('showHome');
Route::view('/admin','admin.dashboard')->name('showDashboard');
Route::view('/admin/posts','admin.posts')->name('showPosts');
Route::view('/admin/posts/new','admin.newPost')->name('showNewPost');
Route::view('/admin/categories','admin.categories')->name('showCategories');
Route::view('/admin/categories/manage','admin.categoryManage')->name('showCategoryManage');
Route::view('/admin/comments','admin.comments')->name('showComments');
Route::view('/admin/users','admin.users')->name('showUsers');
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

