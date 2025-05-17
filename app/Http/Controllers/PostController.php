<?php

namespace App\Http\Controllers;

use App\Http\Requests\likeRequest;
use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
        public function showPostDetail($post_title)
        {
            $categories = Category::all();
            $post = Post::with('comments')->withCount('likes')->where('title', $post_title)->first();
            return view('post', compact('post', 'categories'));
        }
        public function loadPosts($category_name = null)
        {
            if ($category_name) {
                $category_id =  Category::where('name', $category_name)->first()->id;
                $posts = Post::select('id', 'title', 'body', 'writer', 'category_id', 'image', 'view', 'created_at')
                    ->where('status', 'published')
                    ->where('category_id', $category_id)
                    ->with(['category:id,name']) // فقط id و name از دسته‌بندی
                    ->withCount('likes')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            else{
                $posts = Post::select('id', 'title', 'body', 'writer', 'category_id', 'image', 'view', 'created_at')
                    ->where('status', 'published')
                    ->with(['category:id,name']) // فقط id و name از دسته‌بندی
                    ->withCount('likes')
                    ->orderBy('id', 'desc')
                    ->get();
            }


            $arr_posts = [];

            if (Auth::check()) {
                $user = auth()->user();
                $arr_posts = $user->likedPosts()->pluck('posts.id')->toArray();
            }

            $html = '';

            foreach ($posts as $post) {
                $html .= view('partials.loadPost', compact('post', 'arr_posts'))->render();
            }
            return response()->json(['html' => $html]);
        }
    public function loadResultPosts($searchString)
    {
        if ($searchString) {
            $resultPosts = Post::select('id', 'title', 'body', 'writer', 'category_id', 'image', 'view', 'created_at')
                ->where('status', 'published')
                ->where('title', 'like', '%' . $searchString . '%')
                ->with(['category:id,name']) // فقط id و name از دسته‌بندی
                ->withCount('likes')
                ->orderBy('created_at', 'desc')
                ->get();
        }else{
            $resultPosts = [];
        }
        $arr_posts = [];
        if (Auth::check()) {
            $user = auth()->user();
            $arr_posts = $user->likedPosts()->pluck('posts.id')->toArray();
        }
        $html = '';

        foreach ($resultPosts as $post) {
            $html .= view('partials.loadPost', compact('post', 'arr_posts'))->render();
        }
        return response()->json(['html' => $html]);
    }


    public function savedPost()
    {
        Post::all()->each(function (Post $post) {});
    }



}

