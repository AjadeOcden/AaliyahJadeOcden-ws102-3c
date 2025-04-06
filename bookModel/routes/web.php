<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginLogoutController;

Route::get("/register", [LoginLogoutController::class, "registrationForm"])->name('register');
Route::post("/register", [LoginLogoutController::class, "register"]);

Route::get("/login", [LoginLogoutController::class, "loginForm"])->name('login');
Route::post("/login", [LoginLogoutController::class, "login"]);
Route::post("/logout", [LoginLogoutController::class, "logout"])->name('logout');

Route::get("/home", [LoginLogoutController::class, "home"]);
Route::middleware('auth')->get('/home', function(){
return view('home');
});


//Route::resource('books', BookController::class);
Route::middleware('auth')->resource('books', BookController::class);

