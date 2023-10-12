<?php

namespace App\Helper\Service;

use App\Models\Comment;

class CommentService
{
    public static function getDashboardData()
    {
        return Comment::all()->count();
    }

    public static function getAll()
    {
        return Comment::query()
            ->leftJoin('movies', 'comments.movie_id', '=', 'movies.id')
            ->select("movies.name as movie_name", "comments.*")
            ->orderBy('id', 'desc')
            ->get();
    }

    public static function create($request)
    {
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->movie_id = $request->movie_id;
        $comment->is_approved = 0;
        $comment->save();
    }

    public static function updateApproval($id, $approval)
    {
        try {
            $comment = Comment::query()->where("id", "=", $id)->first();
            $comment->is_approved = $approval + 0;
            $comment->update();
            return "success";
        } catch (\Exception  $err) {
            return $err->getMessage();
        }


    }
}
