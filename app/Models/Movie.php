<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    const StoragePath = "storage/movie";


    public function casts():HasMany
    {
        return $this->hasMany(Cast::class);
    }
}
