<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $publishedArticles = \App\Models\Article::with('student', 'advisor')
        ->where('status', 'approved')
        ->latest()
        ->take(6)
        ->get();
        
    $notices = \App\Models\Notice::where('is_active', true)
        ->latest()
        ->take(3)
        ->get();

    return view('welcome', compact('publishedArticles', 'notices'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('articles', \App\Http\Controllers\ArticleController::class);
    Route::patch('articles/{article}/evaluate', [\App\Http\Controllers\ArticleController::class, 'evaluate'])->name('articles.evaluate');

    // Public Profiles
    Route::post('/profile/search', [\App\Http\Controllers\PublicProfileController::class, 'search'])->name('profile.search');
    Route::get('/profile/view/{id}', [\App\Http\Controllers\PublicProfileController::class, 'show'])->name('profile.public.show');

    // Admin Routes
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('users');
        Route::get('/articles', [\App\Http\Controllers\AdminController::class, 'articles'])->name('articles');
        Route::resource('/notices', \App\Http\Controllers\NoticeController::class)->except(['show']);
    });
});

require __DIR__ . '/auth.php';
