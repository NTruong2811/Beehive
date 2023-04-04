<?php

namespace App\Http\Controllers;

use App\helpers\RedisServer;
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
    public $RedisServer;
    public function __construct()
    {
        $this->RedisServer = new RedisServer;
    }
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
            // return $request->all();
            $post = posts::create([
                'user_id' => auth()->id(),
                'type_postId' => $request->type_postId,
                'description' => $request->description,
            ]);

            if ($request->type_postId == 3) {
                $image_file = Cloudinary::uploadFile($request->file('image_file')->getRealPath(), [
                    'folder' => 'images'
                ])->GetSecurePath();
                $song_file = Cloudinary::uploadFile($request->file('song_file')->getRealPath(), [
                    'folder' => 'sounds'
                ])->GetSecurePath();
                $music = musics::create([
                    'post_id' => $post->id,
                    'image_file' => $image_file,
                    'song_file' => $song_file,
                    'song_name' => $request->song_name,
                    'song_artist' => $request->song_artist,
                ]);
            } elseif ($request->type_postId == 2) {
                $file = Cloudinary::uploadFile($request->file('video_file')->getRealPath(), [
                    'folder' => 'videos'
                ])->GetSecurePath();
                $video = videos::create([
                    'post_id' => $post->id,
                    'file' => $file
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
    public function GetPostDetail(Request $request)
    {

        try {
            $data = $this->RedisServer->DataExist('post:' . $request->id);

            if (!$data) {
                $data = posts::with(
                    'type_post',
                    'video',
                    'music',
                    'profile',
                    'user'
                )->find($request)->first();
            }
            $data->next_post = posts::select('id')->where([
                ['id', '>', $request->id],
                ['type_postId', '=', $data->type_postId]
            ])->first();
            $data->prev_post = posts::select('id')->where([
                ['id', '<', $request->id],
                ['type_postId', '=', $data->type_postId]
            ])->orderBy('created_at', 'desc')->first();
            // $data = posts::with('type_post', 'video', 'user')->where('id', '<=', $request->id)
            //     ->orderBy('created_at', 'DESC')
            //     ->where('type_postId', '=', 2)
            //     ->paginate(10);

            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
