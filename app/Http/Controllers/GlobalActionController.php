<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class GlobalActionController extends Controller
{
    public function search(Request $request)
    {
        $SearchResult = users::where('name', 'like', '%' . $request->keyword . '%')->get();
        return $SearchResult;
    }
}
