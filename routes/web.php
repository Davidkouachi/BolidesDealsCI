<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;

Route::get('/refresh-csrf', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::get('/', [Controller::class, 'index_accueil'])->name('index_accueil');
Route::get('/Se Connecter', [Controller::class, 'index_login'])->name('index_login');
Route::get('/Inscription', [Controller::class, 'index_registre'])->name('index_registre');
Route::get('/Mot de passe Oublié', [Controller::class, 'index_reset_password'])->name('index_reset_password');
Route::get('/Nouveau Mot de passe/{token}', [Controller::class, 'index_new_password'])->name('index_new_password');

// Route::middleware(['auth','statuthorsligne','CheckPapierJourMiddleware'])->group(function () {

// });

Route::middleware(['administration:ADMINISTRATEUR'])->group(function () {
    Route::get('/Tableau de Bord', [Controller::class, 'index_accueil_bord'])->name('index_accueil_bord');
    Route::get('/Marques', [Controller::class, 'index_marque_bord'])->name('index_marque_bord');
    Route::get('/Utilisateurs', [Controller::class, 'index_user_bord'])->name('index_user_bord');


    // Route::get('/Tableau de Bord/Suggestions', [Controller::class, 'index_bord_sugg'])->name('index_bord_sugg');

    
    // Route::post('/Traitement marque', [Controller::class, 'trait_marque'])->name('trait_marque');
    // Route::post('/Supprimer marques', [Controller::class, 'suppr_marque'])->name('suppr_marque');
    // Route::post('/Update marque/{id}', [Controller::class, 'update_marque'])->name('update_marque');

    // Route::get('/Tableau de Bord/Rôles', [Controller::class, 'index_bord_role'])->name('index_bord_role');
    // Route::post('/Traitement role', [Controller::class, 'trait_role'])->name('trait_role');
    // Route::post('/Supprimer roles', [Controller::class, 'suppr_role'])->name('suppr_role');
    // Route::post('/Update role/{id}', [Controller::class, 'update_role'])->name('update_role');

    // Route::get('/Tableau de Bord/Utilisateurs', [Controller::class, 'index_bord_user'])->name('index_bord_user');
    // Route::get('/Tableau de Bord/lock/{id}', [Controller::class, 'lock'])->name('lock');
    // Route::get('/Tableau de Bord/unlock/{id}', [Controller::class, 'unlock'])->name('unlock');

    // Route::get('/Tableau de Bord/Paramétrage', [Controller::class, 'index_bord_parametrage'])->name('index_bord_parametrage');
    // Route::post('/trait_nbre_jours_ligne', [Controller::class, 'trait_nbre_jours_ligne'])->name('trait_nbre_jours_ligne');
    // Route::post('/trait_nbre_jours_delete', [Controller::class, 'trait_nbre_jours_delete'])->name('trait_nbre_jours_delete');
    // Route::post('/trait_nbre_refresh', [Controller::class, 'trait_nbre_refresh'])->name('trait_nbre_refresh');
    // Route::post('/trait_nbre_photo', [Controller::class, 'trait_nbre_photo'])->name('trait_nbre_photo');

    // Route::get('/Tableau de Bord/Formules', [Controller::class, 'index_formule'])->name('index_formule');
    // Route::post('/trait_formule', [Controller::class, 'trait_formule'])->name('trait_formule');
    // Route::post('/trait_formule_update/{id}', [Controller::class, 'trait_formule_update'])->name('trait_formule_update');

});

// Route::middleware('statuthorsligne','CheckPapierJourMiddleware')->group(function () {

// });

Route::middleware(['auth'])->group(function () {
    Route::get('/Deconnexion', [AuthController::class, 'deconnexion'])->name('deconnexion');
});
