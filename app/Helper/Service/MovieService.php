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

    public static function creatMovie($movieObj)
    {
        try {
            $movieObj->save();
            return ["success", $movieObj->id];
        } catch (\Exception $err) {
            return ["error", $err];
        }

    }

    public static function getTopMovies()
    {
        return Movie::query()->orderBy('rating', 'asc')->get();
    }

    public static function getAllMoviesWithCasts()
    {

        $movies = Movie::query()->get();
        foreach ($movies as $movie) {
            $casts = $movie->casts;
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
            return ["success"];
        } catch (\Exception $err) {
            return ["error", $err];
        }
    }

    public static function updateMovie($movieObj){

        try {
            $movieObj->update();
            return ["success", $movieObj->id];
        } catch (\Exception $err) {
            return ["error", $err];
        }
    }

    public static function getAllCount(){
        return Movie::all()->count();
    }
}
