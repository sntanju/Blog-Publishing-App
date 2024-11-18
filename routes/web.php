<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/only-verified', function () {
    return view('only-verified');
 })->middleware(['auth', 'verified']);


 Route::resource('blogs', BlogController::class);
 


 Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('blogs', BlogController::class);
    Route::post('blogs/{blog}/vote', [VoteController::class, 'vote'])->name('blogs.vote');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('/blogs/{id}', [AdminMiddleware::class, 'deleteBlog'])->name('admin.blogs.delete');
});


require __DIR__.'/auth.php';
