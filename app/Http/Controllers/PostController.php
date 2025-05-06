<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function loadPosts()
    {
//        $posts = Post::withCount('likes')->get();
        $posts = Post::select('id', 'title', 'body', 'writer', 'date', 'category', 'image','read','view')
            ->withCount('likes')
            ->get();
        return response()->json($posts);
    }

    public function likePost(Request $request)
    {
        return response()->json($request->all());
    }
}
