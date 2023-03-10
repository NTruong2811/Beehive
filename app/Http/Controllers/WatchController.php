<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function Watch()
    {
        try {
            $data = posts::with('type_post', 'music', 'user', 'video')
                ->orderBy('created_at', 'DESC')
                ->paginate(3);
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
                ->orderBy('created_at', 'DESC')->paginate(3);;
            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
