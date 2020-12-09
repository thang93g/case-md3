<?php

use App\Http\Controllers\CartController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('cart')->group(function (){
    Route::post('/',[CartController::class,'store'])->name('cart.store');
    Route::get('/',[CartController::class,'getAll'])->name('cart.getAll');
    Route::post('/{id}',[CartController::class,'update'])->name('cart.update');
    Route::get('/{id}',[CartController::class,'destroy'])->name('cart.destroy');
});
