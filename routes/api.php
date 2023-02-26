<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\V1\Auth;
 
 
Route::post('auth/register', Auth\RegisterController::class);

Route::post('auth/login', Auth\LoginController::class);


Route::middleware('auth:sanctum')->group(function (){
    Route::get('profile', [Auth\ProfileController::class, 'show']);
    Route::put('profile', [Auth\ProfileController::class, 'update']);
    Route::put('password',Auth\PasswordController::class);
    Route::post('auth/logout', Auth\LogoutController::class);

});