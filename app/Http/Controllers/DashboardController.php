<?php

namespace App\Http\Controllers;

use App\Helper\Service\CommentService;
use App\Helper\Service\MovieService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $movieCount = MovieService::getAllCount();
        $comment = CommentService::getDashboardData();
        return view('admin.dashboard')->with(["movies_count"=>$movieCount,"total_comments"=>$comment,"comment_rate"=>$comment]);
    }
}
