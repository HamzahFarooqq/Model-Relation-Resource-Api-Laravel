<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function postComment($post)
    {

    $comments = Post::find($post)->comments;
    return $comments->count();
    // $comments = Post::find($post)->comments()->first();
    
    // $post = Post::find($post);
    // $post = Comment::find($post)->post;



   

 
    // return response()->json([
            
    //     'comment' => $comments,
    //     // 'post' => $post
    // ]);

}


function postComments()
{
    
//     //  $post = post::all();
//  $post = Post::with('comments')->get();
 
            
//  foreach($post as $singlepost){
//  echo $singlepost->comments->comment;
//  echo '<br>';
//  }


  // Retrieve all posts along with their comments
  $posts = Post::with('comments')->get();
//   $posts = Post::all();
    
  // Iterate over each post
  foreach ($posts as $post) {
      // Iterate over each comment of the current post
      foreach ($post->comments as $comment) {
          // Access the comment text for each comment
          echo $comment->comment;
          echo '<br>';
      }
  }


}






function addComment($post)
{
    // $comment = new Comment(['comment' => 'hello, 3rd comment save method.']);

    $post = post::find($post);

    $post->comments()->create(['comment' => 'this 2nd cmnt stores from create method']);

    // $post->comments()->saveMany([
        
    //     new comment(['comment' => 'hello, 4th comment save method.']),
    //     new Comment(['comment' => 'hello, 5th comment save method.']),
    // ]);

    // $post->comments()->createMany([
        
    //     ['comment' => 'hello, 3rd comment create method.'],
    //     ['comment' => 'hello, 4th comment create method.'],
    // ]);

}





}
