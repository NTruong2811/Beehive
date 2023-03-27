<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class NewfeedsController extends Controller
{
    public function index()
    {
        try {
            $data = posts::with('video', 'music', 'profile', 'user')
                ->orderBy('created_at', 'DESC')->paginate(5);
            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
