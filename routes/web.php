<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\HomeController;

Route::get('',[HomeController::class,'showHome'])->name('showHome');
Route::get('/category/{category_name}',[HomeController::class,'showCategoryPosts'])->name('showCategoryPosts');
Route::get('/load/posts/{category_name?}', [PostController::class, 'loadPosts'])->name('loadPosts');
Route::POST('/like/post', [LikeController::class, 'postLike'])->name('postLike');



Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::view('/login','auth.login')->name('showLogin');
        Route::view('/register','auth.register')->name('showRegister');

        Route::view('/forgot','auth.forgot')->name('showForgot');
        Route::post('/forgot/email/check','forgotEmailCheck')->name('forgotEmailCheck');
        Route::view('/forgot/email/check','auth.forgotEmail')->name('showForgotEmailCheck');
        Route::post('/forgot/verify/code','forgotVerifyCode')->name('forgotVerifyCode');
        Route::view('/forgot/new/password','auth.forgotEnd')->name('showCreateNewPass');
        Route::post('/forgot/new/store','forgotNewPasswordStore')->name('forgotNewPasswordStore');

        Route::post('/register/email/check',[AuthController::class, 'registerEmailCheck'])->name('registerEmailCheck');
        Route::get('/register/email/check',[AuthController::class, 'showRegisterEmailCheck'])->name('showRegisterEmailCheck');
        Route::post('/register/create',[AuthController::class, 'verifyCode'])->name('verifyCode');
        Route::get('/register/account',[AuthController::class, 'showCreateAccount'])->name('showCreateAccount');
        Route::post('/register/save/account',[AuthController::class, 'createAccount'])->name('CreateAccount');

        Route::get('/register/verify', [AuthController::class, 'showVerifyForm'])->name('showVerifyForm');
        Route::get('/register/verify/resend', [AuthController::class, 'resendVerifyCode'])->name('resendVerifyCode');

        Route::post('/login',[AuthController::class, 'login'])->name('login');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});


Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('', 'showDashboard');
            Route::get('/dashboard', 'showDashboard')->name('showDashboard');
            Route::get('/categories', 'showCategories')->name('showCategories');
            Route::get('/categories/manage/{id?}', 'showCategoryManage')->name('showCategoryManage');
            Route::delete('/categories/delete', 'categoryDelete')->name('categoryDelete');
            Route::patch('/categories/change/status', 'changeCategoryStatus')->name('changeCategoryStatus');
            Route::post('/categories/create', 'createCategory')->name('createCategory');
            Route::patch('/categories/update', 'updateCategory')->name('updateCategory');
            Route::get('/posts', 'showPosts')->name('showPosts');
            Route::delete('/posts/delete', 'postDelete')->name('postDelete');
            Route::get('/posts/new', 'showNewPost')->name('showNewPost');
            Route::post('/posts/new/create', 'createNewPost')->name('createNewPost');
            Route::patch('/posts/change/status', 'postChangeStatus')->name('postChangeStatus');
            Route::get('/comments', 'showComments')->name('showComments');
            Route::delete('/comments/delete', 'commentDelete')->name('commentDelete');
            Route::patch('/comments/change/status', 'changeCommentStatus')->name('changeCommentStatus');
            Route::get('/users', 'showUsers')->name('showUsers');
            Route::delete('/users/delete', 'userDelete')->name('userDelete');
            Route::patch('/users/change/role', 'userRoleChange')->name('userRoleChange');
        });
});



