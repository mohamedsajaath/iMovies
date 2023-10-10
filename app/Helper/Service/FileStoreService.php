<?php

namespace App\Helper\Service;

class FileStoreService
{
    public static function save($file, $path, $fileNameWithExtension)
    {
        return $file->storeAs($path, $fileNameWithExtension);
    }

    public static function getFileExtension($file)
    {
        return $file->getClientOriginalExtension();
    }
}
