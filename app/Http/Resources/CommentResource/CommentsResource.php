<?php

namespace App\Http\Resources\CommentResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
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
            'comment' => $this->comment,
            'post_id'=> $this->post_id,
            'post' => $this->post,


        ];

      
    }
}
