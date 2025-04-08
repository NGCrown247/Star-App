<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\DestroyUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Users\UserController;
use App\Http\Middleware\AdminRole;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){


    Route::prefix('auth')->group(function(){
//LOGIN ROUTE
       Route::post('/login',[LoginController::class,"login"]);

//REGISTER ROUTE
       Route::get('/register',[UserController::class,"registerForm"])->name('register');
       Route::post('/register',[RegisterController::class,"store"]);

         // USER LOGOUT ROUTE
        Route::post('/logout',[LogOutController::class, 'logout'])->name('users.logout');


        Route::post('/send-verification', [EmailVerificationController::class, 'sendVerificationCode'])->name('send.email');
        Route::post('/verify-code', [EmailVerificationController::class, 'verifyEmail'])->name('verify.code');
        Route::post('/send-accessCode', [PlanController::class, 'sendAccessCode'])->name('send.accessCode');




//----------------PLANS ROUTE----------------------------
Route::get('/all-plans',[PlanController::class,"index"])->name(name: 'plans.index');


    });


// ADMIN MIDDLEWARE ROUTE
    Route::middleware(['auth', AdminRole::class])->group(function(){
    Route::get('/users/list',[AdminController::class, 'userPage'])->name('admin.users');
    Route::get('/all-users',[AdminController::class, 'index'])->name('admin.index');

    Route::post('/users',[AdminController::class, 'store'])->name('admin.store');
    Route::put('/users/{id}',[AdminController::class, 'update'])->name('admin.update');
    Route::delete('/users/{id}',[AdminController::class, 'destroy'])->name('admin.delete');


       // DASHBOARD ROUTE
       Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


       // USER DELETE ROUTE
       Route::delete('/delete/{id}', [DestroyUserController::class, 'destroy'])->name('admin.delete');




//------------------------AUTHENTICATED PLANS ROUTE----------------------------

Route::get('/plans/list',[PlanController::class,"planList"])->name(name: 'plans.list');
 Route::post('/plans',[PlanController::class,"store"])->name('plans.store');
 Route::post('/plans/{id}',[PlanController::class,"update"])->name('plans.update');
 Route::delete('/plans/{id}',[PlanController::class,"destroy"])->name('plans.delete');

Route::get('/codes/list',[PackageController::class,"codeViewPage"])->name(name: 'plans.list');

Route::get('all-codes',[PackageController::class,"index"])->name(name: 'codes.list');
 Route::post('/codes',[PackageController::class,"generateAccessCode"])->name('plans.store');
 Route::post('/codes/{id}',[PackageController::class,"update"])->name('plans.update');
 Route::delete('/codes/{id}',[PackageController::class,"destroy"])->name('plans.delete');


   });

});


Route::get('/tasks',[PlanController::class,"index"])->name(name: 'task.index');
Route::post('/tasks',[PlanController::class,"store"])->name('task.store');
Route::put('/tasks/{id}',[PlanController::class,"update"])->name('task.update');
Route::delete('/tasks/{id}',[PlanController::class,"destroy"])->name('task.delete');


// Route::get('/users',[AdminController::class,"index"])->name('users.index');
Route::post('/users',[AdminController::class,"store"])->name('users.store');
Route::put('/users/{id}',[AdminController::class,"update"])->name('users.update');
// Route::delete('/users/{id}',[AdminController::class,"deleteUser"])->name('users.delete');




Route::get('/accessCode',[PackageController::class,"index"])->name('accessCode.index');


Route::post('/accessCode',[PackageController::class,"generateAccessCode"])->name('accessCode.store');

Route::delete('/accessCode/{id}',[PackageController::class,"deleteAccessCode"])->name('accessCode.delete');
