<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('task/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('task/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('task/update/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::get('task/view/{id}', [TaskController::class, 'view'])->name('task.view');
    Route::get('delete/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
});
