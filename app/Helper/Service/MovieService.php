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
            return ["success",$movieObj->id];
        } catch (\Exception $err) {
            return ["error",$err];
        }

    }

    public static function getTopMovies(){
        return Movie::query()->orderBy('rating','asc')->get();
    }

    public static function getAllMoviesWithCasts(){

        $movies = Movie::query()->get();
        foreach ($movies as $movie) {
            $casts = $movie->casts;
        }
        return $movies;

    }
}
