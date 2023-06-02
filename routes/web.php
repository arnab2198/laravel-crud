<?php

use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TaskController::class, 'index']);
Route::get('/task/create', [TaskController::class, 'create']);
Route::get('/task/update/{id}', [TaskController::class, 'update']);
Route::post('/task/store', [TaskController::class, 'store']);
Route::put('/task/edit/{id}', [TaskController::class, 'edit']);
Route::get('/task/view/{id}', [TaskController::class, 'show']);
Route::delete('/task/delete/{id}', [TaskController::class, 'destroy']);
Route::get('/status/list', [StatusController::class, 'index']);
Route::get('/status/create', [StatusController::class, 'create']);
Route::post('/status/store', [StatusController::class, 'store']);
Route::get('/status/update/{id}', [StatusController::class, 'update']);
Route::put('/status/edit/{id}', [StatusController::class, 'edit']);
Route::get('/status/view/{id}', [StatusController::class, 'show']);
Route::delete('/status/delete/{id}', [StatusController::class, 'destroy']);
