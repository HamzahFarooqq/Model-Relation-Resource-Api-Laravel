<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;
use App\Http\Resources\CommentsResource;

class CommentController extends Controller
{
    function commentPost($comment)
    {
       $comment = Comment::find($comment);
        return  $comment->post->title;
    }


    function commentResource($id)
    {
        return new CommentsResource(comment::find($id));
    }


  
    
}
