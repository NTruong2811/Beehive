<?php

namespace App\Http\Controllers;

use App\helpers\RedisServer;
use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class WatchController extends Controller
{
    public $RedisServer;
    public function __construct()
    {
        $this->RedisServer = new RedisServer;
    }
    public function Watch()
    {
        try {
            $data = posts::with('type_post', 'music', 'user', 'video')
                ->orderBy('created_at', 'DESC')
                ->paginate(3);
            Redis::set('debug',  json_encode($data));

            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function Musics()
    {
        try {
            $data = posts::with('type_post', 'music', 'user')
                ->where('type_postId', '=', 3)
                ->orderBy('created_at', 'DESC')->paginate(3);;
            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function Videos()
    {
        try {
            $data = posts::with('type_post', 'video', 'user')
                ->where('type_postId', '=', 2)
                ->orderBy('created_at', 'DESC')->paginate(3);
            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function VideoDetail(Request $request)
    {

        try {


            $data = $this->RedisServer->DataExist('Post:' . $request->id);
            if (!$data) {
                $data = posts::with(
                    'type_post',
                    'video',
                    'user'
                )->find($request)->first();
            }
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
