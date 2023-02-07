<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Routes para Products
Route::controller(ProductsController::class)->group(function () {
    Route::get('/products/{id}', 'show');
    Route::get('/products/all', 'index');
    Route::post('/products', 'store');
    Route::put('/products/{id}', 'update');
    Route::delete('/products/{id}', 'delete');
});

// Routes para Deliveries
Route::controller(DeliveriesController::class)->group(function () {
    Route::get('/deliveries/{id}', 'show');
    Route::get('/deliveries/all', 'index');
    Route::post('/deliveries', 'store');
    Route::put('/deliveries', 'update');
    Route::delete('/deliveries/{id}', 'delete');
});