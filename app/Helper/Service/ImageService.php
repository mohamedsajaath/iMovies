<?php

namespace App\Helper\Service;


use App\Models\Movie;

class ImageService
{

    public static function create($image,$path = Movie::StoragePath)
    {
        $extension = FileStoreService::getFileExtension($image);
        $imageName = time() . rand(2, 50) . "." . $extension;
        return FileStoreService::save($image, $path, $imageName);

    }

}
