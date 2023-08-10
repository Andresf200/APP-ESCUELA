<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EscuelaController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login',[AuthController::class, 'store'])->name('login');

Route::group(['middleware' => ["auth:sanctum"]],function (){
    Route::delete('/logout',[AuthController::class,'destroy'])->name('logout');

    Route::apiResource('/escuelas', EscuelaController::class)->names('escuelas');

    Route::apiResource('/alumnos', AlumnoController::class)->names('alumnos');
});
