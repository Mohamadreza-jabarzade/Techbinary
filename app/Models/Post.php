<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getReadTimeAttribute()
    {
        $body = strip_tags($this->body ?? '');
        // شمارش کلمات فارسی و انگلیسی
        preg_match_all('/[\p{L}\p{N}_]+/u', $body, $matches);
        $words = count($matches[0]);
        $minutes = max(1, ceil($words / 150));
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
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
