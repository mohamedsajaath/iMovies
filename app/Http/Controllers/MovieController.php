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
        return view('admin.movies')->with(["movies" => $movies]);
    }

    public function getById($id)
    {
        $movie = MovieService::getById($id);
        return view('pages.admin.movie_view')->with(["movie" => $movie]);
    }

    public function create(MovieRequest $movieRequest)
    {
        $movieObj = MovieDTO::getFromWebForm($movieRequest);
        $response = MovieService::creatMovie($movieObj);
        return CastController::create($movieRequest, $response);
    }

    public function destroy($id)
    {
        return MovieService::deleteById($id);
    }

    public function getEditModal($id)
    {
        $movie = MovieService::getMovieWithCasts($id);
        return view("modal.movie_edit_modal")->with(['movie' => $movie]);
    }

    public function update(MovieRequest $movieRequest)
    {
        $movieObj = MovieDTO::getFromWebForm($movieRequest);
        MovieService::updateMovie($movieObj);
        return CastController::update($movieRequest, $movieRequest->id);
    }
}


