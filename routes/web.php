<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth'])->prefix('student')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/projects/create', [StudentController::class, 'create'])->name('student.projects.create');
    Route::post('/projects', [StudentController::class, 'store'])->name('student.projects.store');
    Route::get('/projects/{project}', [StudentController::class, 'show'])->name('student.projects.show');
    Route::get('/projects/{project}/edit', [StudentController::class, 'edit'])->name('student.projects.edit');
    Route::put('/projects/{project}', [StudentController::class, 'update'])->name('student.projects.update');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/projects/{project}', [AdminController::class, 'show'])->name('admin.projects.show');
    Route::put('/projects/{project}/status', [AdminController::class, 'updateStatus'])->name('admin.projects.updateStatus');
    Route::get('/students', [AdminController::class, 'students'])->name('admin.students');
    Route::get('/search', [AdminController::class, 'search'])->name('admin.search');
});