<?php

namespace App\Helper\Service;

use App\Models\Cast;

class CastService
{

    public static function create($movieRequest, $movieId)
    {

        foreach ($movieRequest->cast_name as $index => $name) {
            $cast = new Cast();
            $cast->name = $name;
            $cast->image = ImageService::create($movieRequest->cast_image[$index],"public/cast");
            $cast->movie_id = $movieId;
            $cast->save();
        }

    }

}
