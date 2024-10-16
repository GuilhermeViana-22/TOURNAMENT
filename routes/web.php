<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BracketsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rotas para o perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para o Campeonato e Minha Inscrição
    Route::get('/campeonato', [TeamController::class, 'index'])->name('campeonato');
    Route::get('/inscricao', [TeamController::class, 'inscricao'])->name('inscricao');
    Route::post('/cadastrar', [TeamController::class, 'cadastrar'])->name('cadastrar');
    Route::get('/visualizar', [TeamController::class, 'visualizar'])->name('visualizar');
    Route::get('/bracket', [BracketsController::class, 'bracket'])->name('bracket');

});



require __DIR__.'/auth.php';
