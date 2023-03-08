<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function Watch()
    {
        try {
            $data = posts::with('type_post', 'music', 'user','video')->orderBy('created_at', 'DESC')->get();
            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
