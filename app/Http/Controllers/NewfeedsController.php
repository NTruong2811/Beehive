<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\helpers\RedisServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class NewfeedsController extends Controller
{
    public $RedisServer;
    public function __construct()
    {
        $this->RedisServer = new RedisServer;
    }

    public function index()
    {
        try {
            $data = posts::with(
                'video',
                'music',
                'profile',
                'user',
                'first_comment.user',
                'first_comment.replies.user',
                'likes',
                'check_like'
            )
                ->orderBy('created_at', 'DESC')->paginate(5);
            $this->RedisServer->SetListData('post', $data);
            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
