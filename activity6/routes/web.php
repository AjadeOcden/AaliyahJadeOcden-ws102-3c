<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/act', [OrderController::class, 'index']);
Route::get('/customer/{customerID}/{name}/{address}', [OrderController::class, 'customer']);
Route::get('/item/{itemNo}/{name}/{price}', [OrderController::class, 'item']);
Route::get('/order/{customerID}/{name}/{orderNo}/{date}/', [OrderController::class, 'order']);
Route::get('/orderDetail/{transNo}/{orderNo}/{itemNo}/{name}/{price}/{qty}', [OrderController::class, 'orderDetail']);