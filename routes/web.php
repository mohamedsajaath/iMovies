<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/home/movies', [HomeController::class,'movies'])->name('home_movies');
Route::get('/home/movies/view/{id}', [HomeController::class,'movieView'])->name('home_movies_view');
Route::get('/home/top-movies', [HomeController::class,'top_movies'])->name('home_top_movies');



Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');




Route::get('/movies', [MovieController::class,'index'])->middleware(['auth', 'verified'])->name('movies');
Route::group(['prefix'=>'admin'], function(){
    Route::get('/movies/view/{id}', [MovieController::class,'getById'])->name('admin_view_movie');
    Route::get('/movies/delete/{id}', [MovieController::class,'deleteById'])->name('admin_delete_movie');
    Route::get('/movies/modal/edit/{id}', [MovieController::class,'getEditModal'])->name('admin_edit_movie_modal');

    Route::post('/movies/edit', [MovieController::class,'editMovie'])->name('admin_edit_movie');
    Route::post('/movies/create', [MovieController::class,'createMovie'])->name('admin_create_movie');
})->middleware(['auth', 'verified'])->name('movies');



Route::get('/comments', function () {
    return view('admin.comments');
})->middleware(['auth', 'verified'])->name('comments');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
