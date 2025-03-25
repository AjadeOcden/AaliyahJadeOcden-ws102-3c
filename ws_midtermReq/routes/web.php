<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;

Route::get("/registration", [UserManagementController::class, "registrationForm"]);
Route::post("/registration", [UserManagementController::class, "adminInsertRegistration"]);

Route::get("/viewList", [UserManagementController::class, "readUsers"]);
Route::get("/edit/{id}", [UserManagementController::class, "show"]);
Route::post("/edit/{id}", [UserManagementController::class, "edit"])->name("edit");
Route::get("/delete/{id}", [UserManagementController::class, "delete"])->name('delete');
Route::get("/showDetails/{id}", [UserManagementController::class, "showDetails"]);
// Route::get("/search/{key}", [UserManagementController::class, "search"]);
Route::get("/search", [UserManagementController::class, "search"]); // i use this rather than the other one kasi it doesnt require to add value sa URL
Route::get("/sort", [UserManagementController::class, "sort"]);

Route::get("/login", [UserManagementController::class, "loginForm"]);
Route::post("/login", [UserManagementController::class, "login"]);
Route::get("/userRegistration", [UserManagementController::class, "userRegistrationForm"]);
Route::post("/userRegistration", [UserManagementController::class, "insertRegistration"]);

Route::get("/userDetails/{id}", [UserManagementController:: class, "userDetails"])->name("userDetails");
Route::get("/userEdit/{id}", [UserManagementController::class, "userEditForm"]);
Route::post("/userEdit/{id}", [UserManagementController::class, "userEdit"]);
Route::get("/logout", [UserManagementController::class, "logout"]);




