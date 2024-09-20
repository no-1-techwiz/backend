<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LocationTemplateController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\FeedbackController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', UserController::class);
Route::apiResource('trips', TripController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('location-templates', LocationTemplateController::class);
Route::apiResource('locations', LocationController::class);
Route::apiResource('feedback', FeedbackController::class);

Route::get('trips', [TripController::class, 'index']);