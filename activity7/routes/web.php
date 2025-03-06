<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

Route::get("register", [ResumeController::class, "showForm"])->name("reg");
Route::post("register", [ResumeController::class, "handleForm"]);
