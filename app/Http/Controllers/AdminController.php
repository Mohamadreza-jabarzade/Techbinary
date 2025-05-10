<?php

namespace App\Http\Controllers;

use App\Http\Requests\changeUserRoleRequest;
use App\Http\Requests\deleteUserRequest;
use App\Models\Category;
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
        $categories = Category::withCount('posts')->addSelect('id', 'name', 'status')->get();
        return view('admin.categories', compact( 'categories'));
    }

    public function showCategoryManage()
    {
        return view('admin.categoryManage');
    }
    public function showPosts()
    {
        $posts = Post::withCount('comments')->addSelect('id', 'title','category_id','image','writer','view','status')->get();
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

    public function userDelete(deleteUserRequest $request)
    {
        $userDeleted = User::find(request('id'))->delete();
        if($userDeleted){
           return back()->with('success','User has been deleted');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }

    public function userRoleChange(changeUserRoleRequest $request)
    {
        $user = User::find($request->get('id'));
        if($user){
            if ($user->role == 'admin'){
                $user->role = 'user';
                return back()->with('success','User role has been Updated');
            }
            if ($user->role == 'user'){
                $user->role = 'admin';
                return back()->with('success','User role has been Updated');
            }
        }
        return back()->with('error','Something went wrong');
    }

}
