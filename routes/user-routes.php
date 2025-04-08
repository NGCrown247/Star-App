<?php


use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Users\UserController;
use App\Http\Middleware\UserRole;
use Illuminate\Support\Facades\Route;


Route::get('/', [GuestController::class,'welcome'])->name('welcome');
Route::get('/login', [GuestController::class,'welcome'])->name('login');

//UNAUTHORIZED ROUTE
Route::get('/unauthorized',[UserController::class,"unauthorized"])->name('unauthorized');



// AUTHENTICATED
Route::prefix('/users')->group(function(){

  Route::post('/pay',[PlanController::class,'pay']);
  Route::get('/callback',[PlanController::class,'callback'])->name('payment.callback');



     Route::prefix('auth')->group(function(){

        //LOGIN ROUTE
        // Route::get('/login',[UserController::class,"loginForm"])->name('login');
        Route::post('/login',[LoginController::class,"login"])->name('user.login');

        Route::post('/register',[RegisterController::class,"store"])->name('register');


//USER LOGOUT ROUTE
Route::post('/logout',[LogOutController::class, 'logout'])->name('users.logout');


//WELCOME GUSET ROUTE
        Route::get('/contact', [GuestController::class,'contactUs'])->name('users.contactUs');



//REGISTER ROUTE

//CHECKOUT PLAN ROUTE




     });


//USERS MIDDLWARE ROUTE
    Route::middleware(['auth', UserRole::class])->group(function(){
        //DASHBOARD ROUTE
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');

Route::get('/notification',[UserController::class,"notification"])->name('user.notification');
Route::get('/top-earners',[UserController::class,"topEarners"])->name('users.topEarners');
Route::get('/play-video',[UserController::class,"playVideo"])->name('play.video');
Route::get('/play-music',[UserController::class,"playMusic"])->name('play.music');

//USER DELTE ROUTE
        Route::delete('/delete/{id}',[UserController::class, 'destroy'])->name('users.delete');

    });





});
