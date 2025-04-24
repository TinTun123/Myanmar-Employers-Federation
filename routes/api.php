<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);
Route::get('{type}/{id}/comments', [CommentController::class, 'index']);
Route::post('{type}/{id}/comments', [CommentController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/users', [AuthController::class, 'users']);
    Route::put('/users/{user}', [AuthController::class, 'updateUser']);
    Route::delete('/users/{user}', [AuthController::class, 'deleteUser']);
    Route::Resource('news', NewsController::class);
});
