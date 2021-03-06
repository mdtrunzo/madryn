<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate'); */

Route::post('/quiero-mi-cupon', [App\Http\Controllers\CuponesController::class, 'getCupon'])->name('getCupon');
Route::post('/quiero-mi-cupon-demo', [App\Http\Controllers\CuponesController::class, 'getCupon_demo'])->name('getCupon_demo');


//Route::get('/quiero-mi-cupon', [App\Http\Controllers\CuponesController::class, 'getCupon'])->name('getCupon');


/* Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');

}); */