<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->group(function () {
    // Project routes
    Route::apiResource('projects', ProjectController::class);

    // Nested task routes under projects
    Route::prefix('projects/{project}')->group(function () {
        Route::apiResource('tasks', TaskController::class);
    });

    // Comment routes for tasks
    Route::prefix('tasks/{task}')->group(function () {
        Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
        Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    });

    // User routes
    Route::apiResource('users', UserController::class);
});