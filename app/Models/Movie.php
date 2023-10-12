<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory;
    const StoragePath = "public/movie";

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
        'coming_soon',
        'director',
        'writer'
    ];



    public function casts():HasMany
    {
        return $this->hasMany(Cast::class);
    }
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
