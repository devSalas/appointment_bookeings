<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Middleware\AuthJwt;

Route::post('/register', [ClientController::class,"create"]);
Route::post('/login', [ClientController::class,"login"])->middleware(AuthJwt::class); 

