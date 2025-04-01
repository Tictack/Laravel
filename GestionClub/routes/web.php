<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ControleurBiographies;
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

Route::get('membres', [App\Http\Controllers\ControleurMembres::class, 'index'])->name('membres');
Route::get('membre/{numero}', 'App\Http\Controllers\ControleurMembres@afficher');
Route::get('creer', 'App\Http\Controllers\ControleurMembres@creer');
Route::post('creation/membre', 'App\Http\Controllers\ControleurMembres@enregistrer');
Route::get('modifier/{id}', 'App\Http\Controllers\ControleurMembres@editer');
Route::patch('miseAJour/{id}', [App\Http\Controllers\ControleurMembres::class, 'miseAJour']);

Route::get('modifierbio/{id}', [ControleurBiographies::class, 'edit'])->name('biographie.edition');
Route::patch('miseAJourbio/{id}', [ControleurBiographies::class, 'update'])->name('biographie.update');


Route::get('/identite','App\Http\Controllers\ControleurMembres@identite');
Route::get('/protege','App\Http\Controllers\ControleurMembres@acces_protege')->middleware('auth');


Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
Route::post('/admin/users/{id}/approve', [AdminController::class, 'approve'])->name('admin.users.approve');


require __DIR__.'/auth.php';
