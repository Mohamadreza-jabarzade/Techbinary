<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin.dashboard');
    }
    public function showCategories()
    {
        return view('admin.categories');
    }

    public function showCategoryManage()
    {
        return view('admin.categoryManage');
    }
    public function showPosts()
    {
        $posts = Post::select('id', 'title','category','image','writer','view','status')->get();
        return view('admin.posts',compact('posts'));
    }

    public function showNewPost()
    {
        return view('admin.newPost');
    }
    public function showComments()
    {
        $comments = Comment::with('post:id,title')
            ->select('id','author','content','post_id','created_at')
            ->orderBy('created_at','DESC')
            ->get();
        return view('admin.comments',compact('comments'));
    }
    public function showUsers()
    {
        $users = User::select('id','username','email','role')->get();
        return view('admin.users',compact('users'));
    }

}
