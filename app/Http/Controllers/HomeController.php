<?php

namespace App\Http\Controllers;

use App\Helper\Service\MovieService;


class HomeController extends Controller
{

    public function home()
    {
        $movies = MovieService::getAllMoviesWithCastsAndComments();
        return view('home')->with(["movies" => $movies]);
    }

    public function movies()
    {
        $movies = MovieService::getAllMovies();
        return view('home_movies')->with(["movies" => $movies]);
    }

    public function top_movies()
    {
        $movies = MovieService::getTopMovies();
        return view('home_top_movies')->with(["movies" => $movies]);
    }

    public function movieView($id)
    {
        $movie = MovieService::getAllMoviesWithCastsAndCommentsById($id);
        return view('home_movies_view')->with(["movie" => $movie]);
    }
}
