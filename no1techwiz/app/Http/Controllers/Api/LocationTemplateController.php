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

// Định nghĩa các apiResource một cách ngắn gọn
Route::apiResources([
    'users' => UserController::class,
    'trips' => TripController::class,
    'categories' => CategoryController::class,
    'location-templates' => LocationTemplateController::class,
    'locations' => LocationController::class,
    'feedback' => FeedbackController::class,
]);

// Nếu bạn cần áp dụng middleware cho các route cụ thể, bạn có thể nhóm chúng như sau:
// Ví dụ: Chỉ cho phép tạo, cập nhật và xóa khi người dùng đã đăng nhập
Route::middleware('auth:api')->group(function () {
    Route::apiResources([
        'users' => UserController::class,
        'trips' => TripController::class,
        'categories' => CategoryController::class,
        'location-templates' => LocationTemplateController::class,
        'locations' => LocationController::class,
        'feedback' => FeedbackController::class,
    ]);
});
