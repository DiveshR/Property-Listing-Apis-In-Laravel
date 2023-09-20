<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\BrokerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
});

Route::controller(BrokerController::class)->group(function () {
    Route::get('brokers', 'index');
    Route::get('brokers/{broker}', 'show');
});

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::apiResource('brokers', BrokerController::class)->only(['store', 'update', 'delete']);
    Route::post('logout', [AuthController::class, 'logout']);
});
