<?php

namespace App\Http\Controllers;

use App\Http\Requests\likeRequest;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

        public function loadPosts()
        {
            $posts = Post::select('id', 'title', 'body', 'writer', 'category_id', 'image', 'view', 'created_at')
                ->where('status', 'published')
                ->with(['category:id,name']) // فقط id و name از دسته‌بندی
                ->withCount('likes')
                ->orderBy('id', 'desc')
                ->get();

            $arr_posts = [];

            if (Auth::check()) {
                $user = auth()->user();
                $arr_posts = $user->likedPosts()->pluck('posts.id')->toArray();
            }

            $html = '';

            foreach ($posts as $post) {
                $html .= view('post', compact('post', 'arr_posts'))->render();
            }
            return response()->json(['html' => $html]);
        }

    public function showCategoryPosts($categoryId)
    {
        $posts = Post::select('id', 'title', 'body', 'writer', 'category_id', 'image', 'view', 'created_at')
            ->where('status', 'published')
            ->where('category_id', $categoryId)
            ->with(['category:id,name']) // فقط id و name از دسته‌بندی
            ->withCount('likes')
            ->orderBy('id', 'desc')
            ->get();

        $arr_posts = [];

        if (Auth::check()) {
            $user = auth()->user();
            $arr_posts = $user->likedPosts()->pluck('posts.id')->toArray();
        }

        $html = '';

        foreach ($posts as $post) {
            $html .= view('post', compact('post', 'arr_posts'))->render();
        }
        return response()->json(['html' => $html]);
    }

    public function savedPost()
    {
        Post::all()->each(function (Post $post) {});
    }



}

