<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseProgramController;





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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->controller(UserController::class)->group(function () {
    Route::get('/me', 'me');
    Route::put('/user/update', 'update');
    Route::post('/profile-picture', 'updateProfilePicture');
});

Route::apiResource('courses', CourseController::class);

Route::apiResource('course-programs', CourseProgramController::class);

Route::get('courses/{courseId}/programs', [CourseProgramController::class, 'getByCourse']);

