<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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
