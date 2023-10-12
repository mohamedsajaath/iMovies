<?php

namespace App\Helper\Service;

use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieService
{
    public static function getAllMovies()
    {
        return Movie::all();
    }

    public static function getById($id)
    {
        return Movie::query()->where("id", "=", $id)->get();
    }

    public static function getAllMoviesWithCastsAndCommentsById($id)
    {
        $movie = Movie::query()
            ->where("movies.id", "=", $id)
            ->first();
        $movie->casts;
        $movie->comments;
        return $movie;
    }

    public static function creatMovie($movieObj)
    {
        $movieObj->save();
        return $movieObj->id;
    }

    public static function getTopMovies()
    {
        return Movie::query()->orderBy('rating', 'asc')->get();
    }

    public static function getAllMoviesWithCastsAndComments()
    {

        $movies = Movie::query()->get();
        foreach ($movies as $movie) {
            $movie->casts;
            $movie->comments;
        }
        return $movies;

    }

    public static function getMovieWithCasts($id)
    {
        $movie = Movie::query()->where("id", "=", $id)->get();
        $movie[0]->casts;
        return $movie[0];

    }

    public static function deleteById($id)
    {
        try {
            Movie::query()->where("id", "=", $id)->delete();
            return "success";
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }

    public static function updateMovie($movieObj)
    {
        $movieObj->update();
        return $movieObj->id;
    }

    public static function getAllCount()
    {
        return Movie::all()->count();
    }
}
