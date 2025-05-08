<?php

namespace App\Http\Controllers;

use App\Http\Requests\likeRequest;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function loadPosts()
    {
//        $posts = Post::withCount('likes')->get();

//        return response()->json($posts);
        $userId = auth()->user()->id;
        $user = User::find($userId);
        global $postIds;
        $postIds = $user->likedPosts()->pluck('posts.id');  // خروجی: Collection از idها
        $arr_posts = $postIds->toArray();
        $posts = Post::select('id', 'title', 'body', 'writer', 'date', 'category', 'image','read','view')
            ->withCount('likes')
            ->get();

        $html = '';
        foreach ($posts as $post) {
            $html .= view('post', compact('post','arr_posts'))->render();
        }

        return response()->json(['html' => $html]);
    }


}
