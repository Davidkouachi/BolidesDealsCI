<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SelectController;


Route::middleware(['web'])->group(function () {

    Route::post('/trait_login', [AuthController::class, 'trait_login']);
    Route::post('/trait_registre', [AuthController::class, 'trait_registre']);

});

Route::get('/reset_password_email_lien', [AuthController::class, 'reset_password_email_lien']);
Route::get('/reset_new_password/{token}', [AuthController::class, 'reset_new_password']);



Route::get('/select_type', [SelectController::class, 'select_type']);
