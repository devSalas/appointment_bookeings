<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Middleware\AuthJwt;


Route::get('/', function () {
    return response()->json(['isError' => true, 'data' => [], 'message' => "this server is get up"]);
});


Route::get('/services', [ServiceController::class, 'index']);

Route::get('/services/{id}', [ServiceController::class, 'show']);

Route::post('/services', [ServiceController::class, 'store']);

Route::put('/services/{id}', [ServiceController::class, 'update']);

Route::delete('/services/{id}',[ServiceController::class,'destroy']);

Route::get('/appointment', [AppointmentController::class, 'index']);

Route::get('/appointment/{id}', [AppointmentController::class, 'show']);

Route::post('/appointment', [AppointmentController::class, 'store']);

Route::put('/appointment/{id}', [AppointmentController::class, 'update']);

Route::delete('/appointment/{id}',[AppointmentController::class,'destroy']);

Route::get('/Client', [ClientController::class, 'index']);

Route::get('/Client/{id}', [ClientController::class, 'show']);

Route::post('/Client', [ClientController::class, 'store']);

Route::put('/Client/{id}', [ClientController::class, 'update']);

Route::delete('/Client/{id}',[ClientController::class,'destroy']);


Route::post('/login', [ClientController::class,"login"]);

