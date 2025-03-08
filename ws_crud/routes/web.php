<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/insert', [StudentController::class, 'insertForm']);
Route::post('/create', [StudentController::class, 'insert']);

//Route::get('/create', [StudInsertController::class, 'insert']);
Route::get('/view', [StudentController::class, 'index']);
Route::get('/delete/{id}', [StudentController::class, 'delete']);

Route::get('edit-records',[StudentController::class, 'index']);
Route::get('edit/{id}',[StudentController::class, 'show']);
Route::post('edit/{id}', [StudentController::class, "edit"]);