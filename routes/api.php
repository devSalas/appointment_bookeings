<?php

use App\Http\Controllers\ServiceController;
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


Route::post('/register', [ClientController::class,"create"]);
Route::post('/login', [ClientController::class,"login"]);

