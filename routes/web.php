<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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


// routes/web.php

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('blogs', BlogController::class);
});



Route::resource('blogs', BlogController::class);
Route::resource('/', BlogController::class)->names([
    'index' => 'blogs.index',
    'create' => 'blogs.create',
    'store' => 'blogs.store',
    'show' => 'blogs.show',
  ]);
Route::post('blogs/{blog}/vote', [VoteController::class, 'vote'])->middleware('auth')->name('blogs.vote');
// Route::get('/', [BlogController::class, 'index']);


require __DIR__.'/auth.php';
