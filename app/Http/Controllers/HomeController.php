<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showHome(Request $request)
    {
        global $likedPostIds;
        $categories =  Category::all();

        if (Auth::check()) {
            $query = Like::where('user_id', Auth::id())->pluck('post_id');
            if ($query) {
                return view('index',[
                    'likedPostIds' => $query,
                    'categories' => $categories
                ]);
            }
        }
        return view('index' ,compact('categories'));
    }

}
