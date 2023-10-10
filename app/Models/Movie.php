<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rating',
        'time',
        'release',
        'language',
        'genre',
        'link',
        'thumbnail_image',
        'poster_image',
        'top_section',
        'coming_soon'
    ];
    const StoragePath = "public/movie";

}
