<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getReadTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->body));
        $minutes = max(1, ceil($words / 200)); // حداقل 1 دقیقه
        return "خواندن {$minutes} دقیقه";
    }

    protected $guarded = [];
    use HasFactory;
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
