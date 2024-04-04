<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TacheController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('roles', RoleController::class)->except(['create', 'edit']);
Route::resource('users', AuthController::class)->except(['create', 'edit']);
Route::resource('prestataires', PrestataireController::class)->except(['create', 'edit']);
Route::resource('contrats', ContratController::class)->except(['create', 'edit']);
Route::resource('taches', TacheController::class)->except(['create', 'edit']);
Route::resource('paiements', PaiementController::class)->except(['create', 'edit']);
