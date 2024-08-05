<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Correct definition
    Route::post('/tasks/{task}/comments', [CommentController::class, 'store'])->name('comments.store');

    // Correct definition
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(ProjectController::class)->prefix('projects')->group(function () {
        Route::get('', 'index')->name('projects');
        Route::get('create', 'create')->name('projects.create');
        Route::post('store', 'store')->name('projects.store');
        Route::get('show/{id}', 'show')->name('projects.show');
        Route::get('edit/{id}', 'edit')->name('projects.edit');
        Route::put('edit/{id}', 'update')->name('projects.update');
        Route::delete('destroy/{id}', 'destroy')->name('projects.destroy');

        // Task routes under a specific project

        Route::get('{projectId}/tasks', [TaskController::class, 'index'])->name('projects.tasks.index');
        Route::get('{projectId}/tasks/create', [TaskController::class, 'create'])->name('projects.tasks.create');
        Route::post('{projectId}/tasks', [TaskController::class, 'store'])->name('projects.tasks.store');
        Route::get('{projectId}/tasks/{taskId}', [TaskController::class, 'show'])->name('projects.tasks.show');
        Route::get('{projectId}/tasks/{taskId}/edit', [TaskController::class, 'edit'])->name('projects.tasks.edit');
        Route::put('{projectId}/tasks/{taskId}', [TaskController::class, 'update'])->name('projects.tasks.update');
        Route::delete('{projectId}/tasks/{taskId}', [TaskController::class, 'destroy'])->name('projects.tasks.destroy');
    });

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

    // User routes inside the authenticated middleware group
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

    Route::put('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});