<?php

namespace App\Helper\DTO;

use App\Helper\Service\ImageService;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieDTO
{
    public static function getFromWebForm($request)
    {
        if (!isset($request->id)) {
            $movie = new Movie();
        } else {
            $movie = Movie::query()->where("id", "=", $request->id)->first();
        }
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->rating = $request->rating;
        $movie->time = $request->time;
        $movie->director = $request->director;
        $movie->writer = $request->writer;
        $movie->release = $request->release;
        $movie->language = $request->language;
        $movie->genre = $request->genre;
        $movie->link = $request->link;
        if (isset($request->thumbnail)) {
            $movie->thumbnail_image = ImageService::create($request->thumbnail);
        }
        if (isset($request->poster)) {
            $movie->poster_image = ImageService::create($request->poster);
        }
        $movie->top_section = $request->top_section;
        $movie->coming_soon = $request->coming_soon;
        return $movie;
    }


}
