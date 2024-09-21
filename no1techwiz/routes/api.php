<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LocationTemplateController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\ExpenseController;

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

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
});

Route::apiResource('trips', TripController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('location-templates', LocationTemplateController::class);
Route::apiResource('locations', LocationController::class);
Route::apiResource('feedback', FeedbackController::class);
Route::apiResource('expenses', ExpenseController::class);

Route::post('/login/google', [UserController::class, 'loginWithGoogle']);