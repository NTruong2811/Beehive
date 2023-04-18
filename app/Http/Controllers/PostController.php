<?php

namespace App\Http\Controllers;

use App\helpers\ExtractFile;
use App\helpers\RedisServer;
use App\Jobs\UpdatePost;
use App\Models\likes;
use App\Models\musics;
use App\Models\posts;
use App\Models\profiles;
use App\Models\type_post;
use App\Models\videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cloudinary;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Carbon;

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
            // $a = new ExtractFile($request->all());
            // return var_dump($a->ExtractToJOb());

            $request = new ExtractFile($request);
            // return $request->ExtractToJOb();
            UpdatePost::dispatch($request->ExtractToJOb())->onQueue('UpdatePostQueue');
            // return $data;
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


//    activity
     
   public function UpdateLike(Request $request){
      if ($request->status) {
        unset($request->status);
        return likes::where($request->all())->delete();
      }
      else{
        return likes::create($request->all());
      }
   }

}
