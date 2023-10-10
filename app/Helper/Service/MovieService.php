<?php

namespace App\Helper\Service;

use App\Models\Movie;

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

}
