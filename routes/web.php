<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('/landingpage/welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::get('/users', [DashboardController::class, 'users'])->name('users.index');
    Route::get('/users/{id}/edit', [DashboardController::class, 'editUser'])->name('users.edit');
    Route::post('/users/{id}/update', [DashboardController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{id}', [DashboardController::class, 'deleteUser'])->name('users.delete');
});


// admin routes


// user dash

// Route::middleware(['auth'])->group(function () {
Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); // Display list of posts
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show'); //get one post by id
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); // Show create form
Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Handle form submission
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit'); // Show edit form
Route::post('/posts/{id}', [PostController::class, 'update'])->name('posts.update'); // Handle update submission
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); // Handle delete
// });



require __DIR__.'/auth.php';
