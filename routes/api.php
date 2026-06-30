<?php

use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\TableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/menu',[MenuController::class,'index']);
Route::post('order',[OrderController::class,'order']);
Route::get('table',[TableController::class,'index']);
Route::post('table/book',[TableController::class,'updateStatus']);
