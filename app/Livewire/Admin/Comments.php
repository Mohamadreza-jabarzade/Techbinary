<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On; // برای Laravel 11

class Comments extends Component
{
    public $comments;

    public function mount()
    {
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = Comment::with('post:id,title')
            ->select('id','author','content','post_id','created_at','status')
            ->orderBy('created_at','DESC')
            ->get();
    }

    public function accept($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        if ($comment->status == 'approved') {
            $comment->status = 'draft';
        }else{
            $comment->status = 'approved';
        }
        $comment->save();
        $this->loadComments();
    }
    public function delete($commentId)
    {
        Comment::findOrFail($commentId)->delete();
        $this->loadComments(); // رفرش لیست
    }


    public function render()
    {
        return view('livewire.admin.comments');
    }
}
