<?php

namespace App\Http\Controllers;

use App\Models\musics;
use App\Models\posts;
use App\Models\profiles;
use App\Models\type_post;
use App\Models\videos;
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
            $post = posts::create([
                'user_id' => auth()->id(),
                'type_postId' => $request->type_postId,
                'description' => $request->description
            ]);

            if ($request->type_postId == 3) {
                $image = Cloudinary::uploadFile($request->file('image_file')->getRealPath(), [
                    'folder' => 'images'
                ])->GetSecurePath();
                $src = Cloudinary::uploadFile($request->file('song_file')->getRealPath(), [
                    'folder' => 'sounds'
                ])->GetSecurePath();
                $music = musics::create([
                    'post_id' => $post->id,
                    'image' => $image,
                    'song_name' => $request->song_name,
                    'song_artist' => $request->song_artist,
                    'src' => $src
                ]);
            } elseif ($request->type_postId == 2) {
                $src = Cloudinary::uploadFile($request->file('video_file')->getRealPath(), [
                    'folder' => 'videos'
                ])->GetSecurePath();
                $video = videos::create([
                    'post_id' => $post->id,
                    'src' => $src
                ]);
            } elseif ($request->type_postId == 1) {
                $src = Cloudinary::uploadFile($request->file('files')->getRealPath(), [
                    'folder' => 'files'
                ])->GetSecurePath();
                $profile = profiles::create([
                    'post_id' => $post->id,
                    'files' => $src
                ]);
            }
            $NewPost = posts::with('type_post', 'music', 'user', 'video', 'profile')->find($post->id);
            return $NewPost;
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
