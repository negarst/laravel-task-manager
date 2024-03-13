<?php

use Illuminate\Support\Facades\Route;
use Negarst\TaskManager\Http\Controllers\TaskController;

Route::get('/tasks/{user_id}/{status}', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
