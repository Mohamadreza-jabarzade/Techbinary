<?php

namespace App\Http\Controllers;

use App\Http\Requests\changeCategoryStatusRequest;
use App\Http\Requests\changeCommentStatusRequest;
use App\Http\Requests\changePostStatusRequest;
use App\Http\Requests\changeUserRoleRequest;
use App\Http\Requests\deleteCategoryRequest;
use App\Http\Requests\deleteCommentRequest;
use App\Http\Requests\deletePostRequest;
use App\Http\Requests\deleteUserRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboard()
    {
        $authorsCount = user::all()->where('role', 'admin')->count();
        $categoriesCount = Category::all()->where('status', 'active')->count();
        $postsCount = Post::all()->where('status' , 'published')->count();
        $usersCount = User::all()->count();
        $days = 14;
        global $labels;
        global $commentsData;
        global $viewsData;
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $labels[] = $date->format('Y-m-d');

            $commentsCount = Comment::whereDate('created_at', $date)->count();
            $viewsCount = Post::whereDate('created_at', $date)->sum('view'); // اگر view ذخیره شده در جدول post

            $commentsData[] = $commentsCount;
            $viewsData[] = $viewsCount;
        }
        return view('admin.dashboard', compact('authorsCount', 'categoriesCount', 'postsCount', 'usersCount', 'labels', 'commentsData', 'viewsData'));
    }
    public function showCategories()
    {
        $categories = Category::withCount('posts')->addSelect('id', 'name', 'status')->get();
        return view('admin.categories', compact( 'categories'));
    }

    public function categoryDelete(deleteCategoryRequest $request)
    {
        $deletedCategory = Category::find(request('id'))->delete();
        if($deletedCategory){
            return back()->with('success','category has been deleted');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }

    public function changeCategoryStatus(changeCategoryStatusRequest $request)
    {
        $category = Category::find(request('id'));
        if($category->status == 'active'){
            $category->status = 'inactive';
        }
        else{
            $category->status = 'active';
        }
        $updatedCategory = $category->save();
        if($updatedCategory){
            return back()->with('success','category status has been changed');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }


    public function showCategoryManage()
    {
        return view('admin.categoryManage');
    }
    public function showPosts()
    {
        $posts = Post::with(['category:id,name']) // فقط ستون id و name از category
        ->withCount('comments')
            ->addSelect('id', 'title', 'category_id', 'image', 'writer', 'view', 'status')
            ->get();
        return view('admin.posts',compact('posts'));
    }

    public function showNewPost()
    {
        return view('admin.newPost');
    }

    public function postDelete(deletePostRequest $request)
    {
        $deletedPost = Post::find(request('id'))->delete();
        if($deletedPost){
            return back()->with('success','post has been deleted');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }

    public function postChangeStatus(changePostStatusRequest $request)
    {
        $post = Post::find(request('id'));
        if($post->status == 'published'){
            $post->status = 'draft';
        }
        else{
            $post->status = 'published';
        }
        $updatedPost = $post->update();
        if($updatedPost){
            return back()->with('success','post has been changed');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }
    public function showComments()
    {
        $comments = Comment::with('post:id,title')
            ->select('id','author','content','post_id','created_at','status')
            ->orderBy('created_at','DESC')
            ->get();
        return view('admin.comments',compact('comments'));
    }

    public function commentDelete(deleteCommentRequest $request)
    {
        $commentDeleted = Comment::find(request('id'))->delete();
        if($commentDeleted){
            return back()->with('success','Comment has been deleted');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }

    public function changeCommentStatus(changeCommentStatusRequest $request)
    {
        $comment = Comment::find(request('id'));
        if($comment){
            if($comment->status == 'pending'){
                $comment->status = 'approved';
                if ($comment->update()){
                    return back()->with('success','Comment has been approved');
                }
            }
        }
        return back()->with('error','Something went wrong');
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
                $user->update();
                return back()->with('success','User role has been Updated');
            }
            if ($user->role == 'user'){
                $user->role = 'admin';
                $user->update();
                return back()->with('success','User role has been Updated');
            }
        }
        return back()->with('error','Something went wrong');
    }

}
