<?php

namespace App\Http\Controllers;

use App\Helper\DTO\MovieDTO;
use App\Helper\Service\MovieService;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = MovieService::getAllMovies();
        return view('movies')->with(["movies" => $movies]);
    }

    public function getById($id)
    {

        $movie = MovieService::getById($id);
        return view('pages.admin.movie_view')->with(["movie" => $movie]);
    }

    public function createMovie(MovieRequest $movieRequest)
    {

        $movieObj = MovieDTO::getFromWebForm($movieRequest);
        $response = MovieService::creatMovie($movieObj);

        CastController::create($movieRequest,$response[1]);
        return ["response" => $response];
    }
}


