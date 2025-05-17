<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showHome(Request $request)
    {
        $popularPosts = Post::orderBy('view', 'desc')->limit(6)->get();
        global $likedPostIds;
        $categories =  Category::all();

        if (Auth::check()) {
            $query = Like::where('user_id', Auth::id())->pluck('post_id');
            if ($query) {
                return view('index',[
                    'likedPostIds' => $query,
                    'categories' => $categories,
                    'popularPosts' => $popularPosts
                ]);
            }
        }
        return view('index' ,compact('categories','popularPosts'));
    }

    public function showCategoryPosts($category_name)
    {
        $categoryId = Category::where('name', $category_name)->value('id');
        $popularPosts = Post::all()->where('category_id', $categoryId)->sortbyDesc('view')->take(6);
        global $likedPostIds;
        $categories =  Category::all();

        if (Auth::check()) {
            $query = Like::where('user_id', Auth::id())->pluck('post_id');
            if ($query) {
                return view('index',[
                    'likedPostIds' => $query,
                    'categories' => $categories,
                    'category_name' => $category_name,
                    'popularPosts' => $popularPosts
                ]);
            }
        }
        return view('index' ,compact('categories','category_name','popularPosts'));
    }

    public function showResultPosts(Request $request)
    {
        $searchString = $request->query('searchString');
        global $likedPostIds;
        $categories =  Category::all();
        if (Auth::check()) {
            $likedPostIds = Like::where('user_id', Auth::id())->pluck('post_id');
            if ($likedPostIds) {
                return view('index',[
                    'likedPostIds' => $likedPostIds,
                    'categories' => $categories,
                    'searchString' => $searchString,
                ]);
            }
        }
        return view('result' ,compact('categories','searchString'));
    }

}
