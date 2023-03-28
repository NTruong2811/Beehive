<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\posts;
use App\Models\replies;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function GetComments(Request $request)
    {
        try {
            $data = comments::with(
                'user',
                'replies',
                'replies.user',
                'replies.parent'
            )->where('post_id','=',$request->id)->paginate(5);
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function AddComment(Request $request)
    {
        try {
            $NewComment = comments::create($request->all());
            return comments::with(
                'user',
                'replies',
            )->find($NewComment->id);
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function AddReply(Request $request)
    {
        try {
            $NewReply = replies::create($request->all());
            return replies::with(
                'user',
                'parent',
            )->find($NewReply->id);
            return $NewReply;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
