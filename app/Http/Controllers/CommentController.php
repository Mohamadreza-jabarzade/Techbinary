<?php

namespace App\Http\Controllers;

use App\Http\Requests\createCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment(createCommentRequest $request)
    {
        $createdComment = Comment::create([
            'author' => auth()->user()->username,
            'content'=> request('content'),
            'post_id' => request('post_id'),
            'user_id' => auth()->user()->id,
        ]);
        if ($createdComment) {
            return redirect()->back()->with('success', ' کامنت با موفقیت ارسال شد. لطفا منتطر تایید کامنت خود بمانید. ');
        }
        else{
            return redirect()->back()->with('fail', 'failed to create comment');
        }
    }
}
