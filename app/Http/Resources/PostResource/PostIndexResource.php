<?php

namespace App\Http\Resources\PostResource;

use App\Http\Resources\CommentResource\CommentIndexResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);


        return [
            'id' => $this->id,
            'title' => $this->title,
            'comment' => CommentIndexResource::collection($this->comments),
           
            
        ];


    }
}
