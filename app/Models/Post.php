<?php

namespace App\Models;

// use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'user_id'];

    function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    
    function user()
    {
        return $this->belongsTo(User::class);
    }


}

