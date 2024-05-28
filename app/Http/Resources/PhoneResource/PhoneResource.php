<?php

namespace App\Http\Resources\PhoneResource;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
{
    

    public function toArray(Request $request): array
    {
        

        return [
                 
            'phone' => $this->phone,
            'user_id' => $this->user_id,
            'user' => new UserResource($this->whenLoaded('user')),
            
        ];
    }
}
