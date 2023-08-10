<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login',[AuthController::class, 'store']);

Route::group(['middleware' => ["auth:sanctum"]],function (){
    Route::delete('/logout',[AuthController::class,'destroy'])->name('logout');
});
