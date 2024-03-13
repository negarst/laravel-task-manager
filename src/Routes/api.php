<?php

use Illuminate\Support\Facades\Route;
use Negarst\TaskManager\Http\Controllers\TaskController;

Route::middleware('access.control:list_tasks')
->get('/tasks/list/{status}', [TaskController::class, 'filter']);
Route::middleware('access.control:list_tasks')
->get('/tasks/filter/{user_id}/{status}', [TaskController::class, 'index']);
Route::middleware('access.control:create_task')
->post('/tasks', [TaskController::class, 'store']);
Route::middleware('access.control:see_task')
->get('/tasks/{id}', [TaskController::class, 'show']);
Route::middleware('access.control:update_task')
->put('/tasks/{id}', [TaskController::class, 'update']);
Route::middleware('access.control:delete_task')
->delete('/tasks/{id}', [TaskController::class, 'destroy']);
