<?php

namespace App\Http\Controllers;

use App\Helper\Service\CastService;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public static function create($movieRequest,$movieId){
        return CastService::create($movieRequest,$movieId);
    }
    public static function update($movieRequest,$movieId){
        return CastService::update($movieRequest,$movieId);
    }
}
