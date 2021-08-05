<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\CuponesController::class, 'indexCaba'])->name('index');
Route::get('/bsas', [App\Http\Controllers\CuponesController::class, 'indexCaba'])->name('index');
Route::get('/madryn', [App\Http\Controllers\CuponesController::class, 'indexMadryn'])->name('index');

Route::get('/mailtest', [App\Http\Controllers\CuponesController::class, 'mailtest'])->name('mailtest');



Auth::routes();
