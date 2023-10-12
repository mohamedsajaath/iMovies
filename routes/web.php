<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;

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

//PUBLIC ROUTES
Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/home/movies', [HomeController::class,'movies'])->name('home_movies');
Route::get('/home/movies/view/{id}', [HomeController::class,'movieView'])->name('home_movies_view');
Route::get('/home/top-movies', [HomeController::class,'top_movies'])->name('home_top_movies');

Route::post('/comments/create',[CommentController::class,'create'])->name('comment_create');


//ADMIN ROUTES
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/movies', [MovieController::class,'index'])->name('movies');
    Route::get('/movies/view/{id}', [MovieController::class,'getById'])->name('admin_view_movie');
    Route::get('/movies/modal/edit/{id}', [MovieController::class,'getEditModal'])->name('admin_edit_movie_modal');

    Route::get('/movies/delete/{id}', [MovieController::class,'destroy']);
    Route::post('/movies/edit', [MovieController::class,'update'])->name('admin_edit_movie');
    Route::post('/movies/create', [MovieController::class,'create'])->name('admin_create_movie');

    Route::get('/comments',[CommentController::class,'index'])->name('comments');
    Route::get('/comments/update/{id}/{approval}',[CommentController::class, 'updateApproval']);

});



//AUTH ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
