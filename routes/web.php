<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* ----- CRUD de usuarios ------------------------------------------------ */
    Route::resource('usuarios', UsuarioController::class);

    /* ----- Flujo “Adjuntar foto” ------------------------------------------- */
    Route::get('usuarios/{usuario}/foto',  [UsuarioController::class, 'editFoto'])
        ->name('usuarios.foto.edit');

    Route::post('usuarios/{usuario}/foto', [UsuarioController::class, 'updateFoto'])
        ->name('usuarios.foto.update');

    Route::get('usuarios/{usuario}/foto',  [UsuarioController::class, 'editFoto'])
        ->name('usuarios.foto.edit');
    Route::post('usuarios/{usuario}/foto', [UsuarioController::class, 'updateFoto'])
        ->name('usuarios.foto.update');

    Route::get('user', [PerfilController::class, 'show'])->name('perfil.show');
    Route::put('user', [PerfilController::class, 'update'])->name('perfil.update');
});

require __DIR__ . '/auth.php';
