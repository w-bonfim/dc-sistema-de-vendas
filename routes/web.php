<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\DefaultController;
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

//front
Route::get('/', [DefaultController::class, 'index']);
Route::get('/finalizar-pedido/{id}', [DefaultController::class, 'show']);
Route::post('/finalizar-pedido/salvar', [DefaultController::class, 'store']);

//admin
Route::get('/dashboard', [ProductController::class, 'index'])->middleware('auth');
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');
Route::get('/vendas', [ProductController::class, 'sales'])->middleware('auth');

//login
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);
