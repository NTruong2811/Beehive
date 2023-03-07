<?php

namespace App\Http\Controllers;

use App\Models\type_post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cloudinary;

class PostController extends Controller
{
    public function GetTypePost()
    {
        try {
            $type_post = type_post::all();
            return response()->json([
                'message' => 'success',
                'data' => $type_post,
                'status' => 0
            ]);
        } catch (\Throwable $th) {
            return $th;
            return response()->json([
                'message' => 'Something went wrong please try again later',
                'status' => 1
            ]);
        }
    }
    public function UpdatePost(Request $request)
    {
        try {
            $test = Cloudinary::uploadFile($request->file('song_file')->getRealPath())->GetSecurePath();
            return $test;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
