<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);
Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store']);
Route::get('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'show']);
Route::post('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'update']); // PUT & PATCH method doesn't work so change to POST
Route::delete('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'destroy']);
