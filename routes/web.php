<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', fn() => view('mapa'))->name('home');
Route::get('/nivells', fn() => view('nivells'))->name('nivells');
Route::get('/perfil', fn() => view('perfil'))->name('perfil');
Route::get('/ranking', fn() => view('ranking'))->name('ranking');
Route::get('/repaso', fn() => view('repaso'))->name('repaso');  // crea la vista cuando quieras
Route::get('/config', fn() => view('config'))->name('config');

require __DIR__.'/auth.php';