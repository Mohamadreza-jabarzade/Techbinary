<?php

namespace App\Http\Controllers;

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
    public function showPosts()
    {
        return view('admin.posts');
    }
    public function showComments()
    {
        return view('admin.comments');
    }
    public function showUsers()
    {
        return view('admin.users');
    }

}
