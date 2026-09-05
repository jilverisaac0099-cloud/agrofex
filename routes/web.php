<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressShippingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// RUTA PARA FORZAR EL CIERRE DE SESIÓN VIEJA
// ==========================================
Route::get('/salir', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
});

// Ruta de diagnóstico para descubrir tu rol actual
Route::get('/debug-rol', function () {
    if (!auth()->check()) return 'No hay ninguna sesión activa. Inicia sesión primero.';
    return 'Usuario conectado: ' . auth()->user()->email . ' | Rol exacto: [' . auth()->user()->role . ']';
});

// Zonas protegidas
Route::middleware(['auth', 'verified'])->group(function () {

    // ==========================================
    // DASHBOARD (Acceso para todos los logueados)
    // ==========================================
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ==========================================
    // ZONA 1: EXCLUSIVO ADMINISTRADOR
    // ==========================================
    Route::middleware(['role:administrador'])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('producers', ProducerController::class);
    });

    // ==========================================
    // ZONA 2: GESTIÓN DE CATÁLOGO (Admin y Productor)
    // ==========================================
    Route::middleware(['role:administrador,productor'])->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('customers', CustomerController::class);
    });

    // ==========================================
    // ZONA 3: FINANZAS Y PEDIDOS (Permisos Divididos)
    // ==========================================
    
    // A. Solo Lectura (Admin, Productor y AUDITOR)
    Route::middleware(['role:administrador,productor,auditor'])->group(function () {
        Route::resource('orders', OrderController::class)->only(['index', 'show']);
        Route::resource('order_details', OrderDetailController::class)->only(['index', 'show']);
        Route::resource('payments', PaymentController::class)->only(['index', 'show']);
    });

    // B. Escritura y Modificación (Admin y Productor)
    Route::middleware(['role:administrador,productor'])->group(function () {
        Route::resource('orders', OrderController::class)->except(['index', 'show']);
        Route::resource('order_details', OrderDetailController::class)->except(['index', 'show']);
        Route::resource('payments', PaymentController::class)->except(['index', 'show']);
    });

    // ==========================================
    // ZONA 4: CLIENTES Y GENERAL
    // ==========================================
    Route::middleware(['role:administrador,productor,cliente'])->group(function () {
        Route::resource('address_shippings', AddressShippingController::class);
        Route::resource('comments', CommentController::class);
    });
});

// ==========================================
// PERFIL DE USUARIO
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
