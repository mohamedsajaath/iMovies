<?php

namespace App\Helper\Service;

use App\Models\Comment;

class CommentService
{

    public static function getDashboardData(){
       $count =  Comment::all()->count();

       return $count;
    }



}
