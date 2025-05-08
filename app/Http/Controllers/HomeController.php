<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showHome(Request $request)
    {
        global $likedPostIds;

        if (Auth::check()) {
            $query = Like::where('user_id', Auth::id())->pluck('post_id');
            if ($query) {
                return view('index',[
                    'likedPostIds' => $query,
                ]);
            }
        }
        return view('index');
    }
}
