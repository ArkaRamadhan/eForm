<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermohonanController;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [PermohonanController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/create', [PermohonanController::class, 'create']);
    Route::post('admin/store', [PermohonanController::class, 'store'])->name('admin/store');
    Route::delete('admin/destroy/{id}', [PermohonanController::class, 'destroy']);
    Route::get('admin/show/{id}', [PermohonanController::class, 'show']);
    Route::post('word/{id}', [PermohonanController::class, 'word'])->name('word');
});

Route::get('create', [UserController::class, 'create']);
Route::post('store', [UserController::class, 'store'])->name('store');
Route::get('success', [UserController::class, 'success'])->name('success');


require __DIR__ . '/auth.php';
