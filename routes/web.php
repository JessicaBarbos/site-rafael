<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ImovelController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/clientes')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');
        Route::post('/', [ClientController::class, 'store']);
        Route::delete('/{id}', [ClientController::class, 'destroy']);
        Route::get('/{id}', [ClientController::class, 'show']);
    });

    Route::prefix('/imoveis')->group(function () {
        Route::get('/', [ImovelController::class, 'index'])->name('imovel.index');
        Route::post('/', [ImovelController::class, 'store']);
        Route::get('/novo', [ImovelController::class, 'new']);
        Route::get('/edit/{id}', [ImovelController::class, 'edit']);
        Route::patch('/{id}', [ImovelController::class, 'update'])->name('profile.update');
        Route::delete('/{id}', [ImovelController::class, 'destroy']);
        // Route::get('/{id}', [ImovelController::class, 'show']);
    });
});



require __DIR__ . '/auth.php';
