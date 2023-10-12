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
            $cast->image = ImageService::create($movieRequest->cast_image[$index], Cast::StoragePath);
            $cast->movie_id = $movieId;
            $cast->save();
        }
    }

    public static function update($movieRequest, $movieId)
    {
        foreach ($movieRequest->cast_name as $index => $name) {
            $cast = Cast::query()->where("id", "=", $movieRequest->cast_id[$index])->first();
            $cast->name = $name;
            if (isset($movieRequest->cast_image[$index])) {
                $cast->image = ImageService::create($movieRequest->cast_image[$index], Cast::StoragePath);
            }
            $cast->movie_id = $movieId;
            $cast->update();
            return ["success"];
        }
    }

}
