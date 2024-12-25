<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TaskController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->group(function () {
    // logout
    Route::post('logout', [AuthController::class, 'logout']);

    // tasks
    Route::get('tasks', [TaskController::class, 'index']);
    Route::post('task/create', [TaskController::class, 'store']);
    Route::get('task/view/{id}', [TaskController::class, 'view']);
    Route::put('task/update/{id}', [TaskController::class, 'update']);
    Route::delete('task/delete/{id}', [TaskController::class, 'destroy']);
});
