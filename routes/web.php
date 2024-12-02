<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerOrderStatusController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;

// Página principal
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    $totalOrders = \App\Models\Order::count();
    $totalUsers = \App\Models\User::count();
    return view('dashboard', [
        'totalOrders' => $totalOrders,
        'totalUsers' => $totalUsers,
    ]);
})->name('dashboard');


// Perfil de usuario (Acceso para cualquier usuario autenticado)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para administradores (Acceso completo a usuarios y pedidos)
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Bienvenido al panel de administración';
    })->name('admin.dashboard');

    Route::resource('admin/users', UserController::class, ['as' => 'admin']);
    Route::get('orders/manage-stock', [OrderController::class, 'manageStock'])->name('orders.manageStock');
});

// Gestión de pedidos (Acceso para Ventas y Admin)
Route::middleware(['auth', 'role:Ventas|Admin'])->group(function () {
    Route::resource('orders', OrderController::class)->except(['show']);
    Route::patch('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::patch('orders/{order}/upload-photo', [OrderController::class, 'uploadPhoto'])->name('orders.uploadPhoto');
});

// Consulta de estado de pedidos por parte de clientes
Route::get('order-status', [CustomerOrderStatusController::class, 'showStatusForm'])->name('orders.showStatusForm');
Route::post('order-status', [CustomerOrderStatusController::class, 'checkStatus'])->name('orders.checkStatus');

// Confirmación de pedidos
Route::get('orders/confirmation/{order}', [OrderController::class, 'confirmation'])->name('orders.confirmation');

require __DIR__ . '/auth.php';
