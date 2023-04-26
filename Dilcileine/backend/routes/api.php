<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth', [Auth::class, 'auth']);
Route::get('/auth/verify', [Auth::class, 'verify']);
Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer/list', [CustomerController::class, 'index']);
Route::delete('/customer/del/{id}', [CustomerController::class, 'destroy']);
Route::get('/customer/get/{id}', [CustomerController::class, 'show']);
Route::post('/customer/update/{id}', [CustomerController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
