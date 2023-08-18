<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome.index');