<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculateController;
// so sa code na ito if mag iinput si user using URL ipapasa niya yung op, num1, and num2 sa CalculateController sa calculate class
Route::get('/{op}/{num1}/{num2}', [CalculateController::class, "calculate"]);
