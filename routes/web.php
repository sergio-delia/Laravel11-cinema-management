<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgrammazioneController;
use App\Http\Controllers\SalaController;
use Illuminate\Support\Facades\Route;

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
});

Route::resource('films', FilmController::class);
Route::resource('salas', SalaController::class);
Route::resource('programmazioni', ProgrammazioneController::class);

require __DIR__.'/auth.php';
