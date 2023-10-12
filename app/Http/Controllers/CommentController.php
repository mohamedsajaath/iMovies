<?php

namespace App\Http\Controllers;

use App\Helper\Service\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = CommentService::getAll();
        return view('admin.comments')->with(["comments" => $comments]);
    }

    public function create(Request $request)
    {
        CommentService::create($request);
        return redirect('/home/movies/view/' . $request->movie_id);
    }

    public static function updateApproval($id, $approval)
    {
        return CommentService::updateApproval($id, $approval);
    }
}
