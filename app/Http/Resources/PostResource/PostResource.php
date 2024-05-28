<?php

namespace App\Http\Resources\PostResource;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            
            // 'user' => $this->user,
            // 'user' =>  new UserResource($this->user) ,

            'comments' => $this->comments,
        ];


    }
}
