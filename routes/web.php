<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Registrar middleware de roles directamente en la ruta de administración
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Bienvenido al panel de administración';
    });
});

Route::middleware(['auth', 'role:Ventas|Admin'])->group(function () {
    Route::resource('orders', OrderController::class);
    Route::get('orders/manage-stock', [OrderController::class, 'manageStock'])->name('orders.manageStock');
});

Route::middleware(['auth', 'role:Almacén|Admin'])->group(function () {
    Route::patch('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});


require __DIR__.'/auth.php';
