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

Route::get('/', [App\Http\Controllers\HomeController::class, 'getCupon'])->name('getCupon');

Route::get('/quiero-mi-cupon', [App\Http\Controllers\HomeController::class, 'getCupon'])->name('getCupon');

Auth::routes();

Route::get('/getCupon', [App\Http\Controllers\HomeController::class, 'getCupon'])->name('getCupon');


Route::get('/Cupon-List', [App\Http\Controllers\HomeController::class, 'listCupons'])->name('listCupons');
