<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\posts;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function AddComment(Request $request)
    {
        try {
            $NewComment = comments::create($request->all());
            return posts::with(
                'type_post',
                'video',
                'user',
                'comments',
                'comments.user',
                'comments.replies',
                'comments.replies.user'
            )->find($NewComment->post_id);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
