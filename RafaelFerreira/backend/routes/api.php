<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)->prefix('auth')->group(function (){
    Route::post('/login',    [AuthController::class, 'login']);
    Route::post('/logout',   [AuthController::class, 'logout']);
    Route::post('/refresh',  [AuthController::class, 'refresh']);
    Route::get('/me',       [AuthController::class, 'me']);
});