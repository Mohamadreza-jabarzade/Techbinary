<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On; // برای Laravel 11

class Posts extends Component
{
    public $posts;

    public function mount()
    {
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $this->posts = Post::with(['category:id,name'])
            ->withCount('comments')
            ->addSelect('id', 'title', 'category_id', 'image', 'writer', 'view', 'status')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function changeStatus($postId)
    {
        $post = Post::findOrFail($postId);
        if ($post->status == 'published') {
            $post->status = 'draft';
        }else{
            $post->status = 'published';
        }
        $post->save();
        $this->loadPosts();
    }
    public function delete($postId)
    {
        Post::findOrFail($postId)->delete();
        $this->loadPosts(); // رفرش لیست
    }

    public function render()
    {
        return view('livewire.admin.posts');
    }
}
