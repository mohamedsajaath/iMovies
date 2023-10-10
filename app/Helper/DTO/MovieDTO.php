<?php

namespace App\Helper\DTO;
use App\Helper\Service\ImageService;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieDTO
{
    public static function getFromWebForm($request){
        $movie = new Movie();
        $movie->name =$request->name;
        $movie->description = $request->description;
        $movie->rating = $request->rating;
        $movie->time = $request->time;
        $movie->release = $request->release;
        $movie->language = $request->language;
        $movie->genre = $request->genre;
        $movie->link = $request->link;
        $movie->thumbnail_image = ImageService::create($request->thumbnail);
        $movie->poster_image = ImageService::create($request->poster);
        $movie->top_section = $request->top_section;
        $movie->coming_soon = $request->coming_soon;
        return $movie;
    }


}
