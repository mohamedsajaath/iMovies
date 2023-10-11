<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class,'home'])->name('home');
Route::get('/home/movies', [\App\Http\Controllers\HomeController::class,'movies'])->name('home_movies');
Route::get('/home/movies/view/{id}', [\App\Http\Controllers\HomeController::class,'movieView'])->name('home_movies_view');
Route::get('/home/top-movies', [\App\Http\Controllers\HomeController::class,'top_movies'])->name('home_top_movies');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::get('/movies', [\App\Http\Controllers\MovieController::class,'index'])->middleware(['auth', 'verified'])->name('movies');
Route::group(['prefix'=>'admin'], function(){
    Route::get('/movies/view/{id}', [\App\Http\Controllers\MovieController::class,'getById'])->name('admin_view_movie');
    Route::post('/movies/create', [\App\Http\Controllers\MovieController::class,'createMovie'])->name('admin_create_movie');
})->middleware(['auth', 'verified'])->name('movies');



Route::get('/comments', function () {
    return view('comments');
})->middleware(['auth', 'verified'])->name('comments');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
