<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Cast extends Model
{
    use HasFactory;

    const StoragePath = "public/cast";
    protected $fillable = [
        'name',
        'image',
        'movie_id'
    ];
}
