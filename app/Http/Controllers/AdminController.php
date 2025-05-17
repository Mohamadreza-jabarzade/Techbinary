<?php

namespace App\Http\Controllers;

use App\Http\Requests\changeCategoryStatusRequest;
use App\Http\Requests\changeCommentStatusRequest;
use App\Http\Requests\changePostStatusRequest;
use App\Http\Requests\changeUserRoleRequest;
use App\Http\Requests\createCategoryRequest;
use App\Http\Requests\createPostFormRequest;
use App\Http\Requests\deleteCategoryRequest;
use App\Http\Requests\deleteCommentRequest;
use App\Http\Requests\deletePostRequest;
use App\Http\Requests\deleteUserRequest;
use App\Http\Requests\editPostRequest;
use App\Http\Requests\updateCategoryRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
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


    public function showCategoryManage($categoryId = null)
    {
        if ($categoryId == null) {
            return view('admin.categoryManage');
        }
        if ($categoryId !== null) {
            $category = Category::find($categoryId);
            return view('admin.categoryManage', compact('category'));
        }

    }

    public function createCategory(createCategoryRequest $request)
    {
        $createdCategory = Category::create([
            'name' => request('name'),
            'slug' => request('slug'),
        ]);
        if($createdCategory){
            return redirect()->route('showCategories')->with('success','category has been created');
        }
        else{
            return redirect()->route('showCategories')->with('error','Something went wrong');
        }

    }

    public function updateCategory(updateCategoryRequest $request)
    {
        $category = Category::find(request('category_id'));
        if ($category) {
            $category->name = request('name');
            $category->slug = request('slug');
            $updatedCategory = $category->save();
            if($updatedCategory){
                return redirect()->route('showCategories')->with('success','category has been updated');
            }
            else{
                return redirect()->route('showCategories')->with('error','Something went wrong');
            }
        }
        else{
            return redirect()->route('showCategories')->with('error','Something went wrong');
        }

    }
    public function showPosts()
    {
        $posts = Post::with(['category:id,name']) // فقط ستون id و name از category
        ->withCount('comments')
            ->addSelect('id', 'title', 'category_id', 'image', 'writer', 'view', 'status')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.posts',compact('posts'));
    }

    public function showEditPost(Post $post)
    {
        //route model binding
        $categories =  Category::all()->where('status', 'active')->sortByDesc('created_at');
        return view('admin.editPost', compact('categories', 'post'));
    }
    public function showNewPost()
    {
        $categories =  Category::all()->where('status', 'active')->sortByDesc('created_at');
        return view('admin.newPost', compact('categories'));
    }

    public function createNewPost(createPostFormRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'writer' => auth()->user()->username ?? 'مدیر', // یا دستی مقدار بده
            'body' => $request->body,
            'view' => 0,
            'status' => 'draft', // یا 'published' اگر می‌خوای فوراً منتشر شه
        ]);

        return redirect()->route('showPosts')->with('success', 'پست با موفقیت ثبت شد.');
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

    public function editPost(editPostRequest $request)
    {
        $imagePath = null;
        $post = Post::findOrFail($request->id);
            if ($post) {
                    if ($request->hasFile('image')) {
                        // ذخیره عکس جدید
                        $imagePath = $request->file('image')->store('posts', 'public');
                    }
            $post->title = request('title');
            $post->category_id = request('category_id');
            $post->writer = auth()->user()->username ?? 'مدیر';
            $post->body = request('body');
            if ($imagePath) {
                $post->image = $imagePath;
            }
            $updatedPost = $post->save();
            if($updatedPost){
                return redirect()->route('showPosts')->with('success', 'post has been updated');
            }
            else{
                return redirect()->route('showPosts')->with('error', 'تغییراتی روی پست مورد نظر صورت نگرفت');
            }
        }
        else{
            return redirect()->route('showPosts')->with('error', 'پست مورد پیدا نشد');
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
