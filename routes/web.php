<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\TopController;
use App\Http\Controllers\Customer\CartController;

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

Route::get('/top', [TopController::class, 'showTop'])->name('top');
Route::get('detail/{item}', [TopController::class, 'showDetail'])->name('detail');

Route::prefix('cart')->group(function(){
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('add', [CartController::class, 'add'])->name('cart.add');
    Route::put('update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('delete/{product}', [CartController::class, 'delete'])->name('cart.delete');
    Route::delete('remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('success', [CartController::class, 'success'])->name('cart.success');
    Route::get('cancel', [CartController::class, 'cancel'])->name('cart.cancel');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
