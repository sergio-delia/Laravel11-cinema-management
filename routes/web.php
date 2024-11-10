<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgrammazioneController;
use App\Http\Controllers\SalaController;
use App\Models\Programmazione;
use Illuminate\Support\Facades\Log;
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
// Route::resource('programmazioni', ProgrammazioneController::class);
Route::get('programmazioni', [ProgrammazioneController::class, 'index'])->name('programmazioni.index');
Route::get('programmazioni/create', [ProgrammazioneController::class, 'create'])->name('programmazioni.create');
Route::post('programmazioni', [ProgrammazioneController::class, 'store'])->name('programmazioni.store');
Route::get('programmazioni/{programmazione}', [ProgrammazioneController::class, 'show'])->name('programmazioni.show');
Route::get('programmazioni/{programmazione}/edit', [ProgrammazioneController::class, 'edit'])->name('programmazioni.edit');
Route::put('programmazioni/{programmazione}', [ProgrammazioneController::class, 'update'])->name('programmazioni.update');
Route::delete('programmazioni/{programmazione}', [ProgrammazioneController::class, 'destroy'])->name('programmazioni.destroy');


Route::get('/programmazione/oggi', [ProgrammazioneController::class, 'oggi'])->name('programmazione.oggi');


Route::get('settimanale', [ProgrammazioneController::class, 'weeklySchedule'])->name('programmazioni.settimanale');

Route::delete('orari/{orario}', [ProgrammazioneController::class, 'destroyOrario'])->name('orari.destroy');


require __DIR__.'/auth.php';
