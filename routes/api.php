<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\DeleteController;


Route::middleware(['web'])->group(function () {

    Route::post('/trait_login', [AuthController::class, 'trait_login']);
    Route::post('/trait_registre', [AuthController::class, 'trait_registre']);


    Route::post('/insert_marque', [InsertController::class, 'insert_marque']);
    Route::post('/insert_user_verouille/{mat}', [InsertController::class, 'insert_user_verouille']);
    Route::post('/insert_user_deverouille/{mat}', [InsertController::class, 'insert_user_deverouille']);
    Route::post('/insert_notification/{mat}', [InsertController::class, 'insert_notification']);


    Route::post('/update_marque/{id}', [UpdateController::class, 'update_marque']);


    Route::post('/delete_marque', [DeleteController::class, 'delete_marque']);

});

Route::get('/reset_password_email_lien', [AuthController::class, 'reset_password_email_lien']);
Route::get('/reset_new_password/{token}', [AuthController::class, 'reset_new_password']);



Route::get('/select_type', [SelectController::class, 'select_type']);


Route::get('/list_marque_all', [ListController::class, 'list_marque_all']);
Route::get('/list_users_all', [ListController::class, 'list_users_all']);



