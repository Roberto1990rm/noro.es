<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RevisorController;

use App\Models\Ad;

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





Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');
Route::post('/ads', [AdController::class, 'store'])->name('ads.store');
Route::get('/ads', [AdController::class, 'index'])->name('ads.index');
Route::get('/ads/{id}', [AdController::class, 'show'])->name('ads.show');
Route::get('/ads/{id}/edit', [AdController::class, 'edit'])->name('ads.edit');
Route::put('/ads/{id}', [AdController::class, 'update'])->name('ads.update');
Route::get('/my-ads', [AdController::class, 'showMyAds'])->name('ads.show-my-ads');
Route::delete('/ads/{id}', [AdController::class, 'destroy'])->name('ads.destroy');
Route::post('/ads/{id}/like', [AdController::class, 'likeAd'])->name('ads.like');

// routes/web.php


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::post('users/{user}/assign-revisor', [AdminController::class, 'assignRevisor'])->name('admin.users.assign_revisor');
    Route::post('users/{user}/remove-revisor', [AdminController::class, 'removeRevisor'])->name('admin.users.remove_revisor');

});

Route::middleware(['auth', 'revisor'])->prefix('revisor')->group(function () {
    Route::get('revisor', [RevisorController::class, 'index'])->name('revisor.index');
    Route::post('/revisor/update-visibility/{id}', [RevisorController::class, 'updateVisibility'])->name('revisor.update-visibility');

});



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome.index');