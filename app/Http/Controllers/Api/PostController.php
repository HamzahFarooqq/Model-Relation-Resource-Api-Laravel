<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource\PostResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::all());

        // return PostResource::collection(Post::with('comments')->paginate('2'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = $request->all();

        $post =    Post::create($post);

        return new PostResource($post);

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findorfail($id);

        // return new PostResource($post);

        return response()->json([
            'data' => new PostResource($post),
            'status' => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findorfail($id);

        $post->update($request->all());

        return response()->json([
            'data' => new PostResource($post),
            'status' => 'success',
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        

        try {

            $post = Post::findOrFail($id);
    
            // Delete the related comments first
            $post->comments()->delete();
    
            // Then delete the post
            $post->delete();
    
            return response()->json([                
                'status' => 'success',
                'message' => 'Post deleted successfully',
            ]);
            
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Post not found',
            ], 404);
        }


    }
}
