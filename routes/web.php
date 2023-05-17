<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CocheViewController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
Route::get('/coches', 'CocheController@listarCoches');
Route::get('/coches', [CocheViewController::class, 'index'])->name('coches.index');
Route::get('/coches/{id}', [CocheViewController::class, 'show'])->name('coches.show');
Route::get('/carrito', [CartController::class, 'show'])->name('cart.show');
Route::get('/cart/add/{coche}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{coche}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::post('/pedidos/store', [CartController::class, 'store'])->name('pedidos.store');



require __DIR__.'/auth.php';
