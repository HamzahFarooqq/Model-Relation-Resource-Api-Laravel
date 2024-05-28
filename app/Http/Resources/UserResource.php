<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PostResource\PostResource;

class UserResource extends JsonResource
{
    

    protected $token;

    public function __construct($resource, $token = null)
    {
        parent::__construct($resource);
        $this->token = $token;

    }
        
        


    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            // 'name' => $this->name,
            'email' => $this->email,
            // 'post' =>  $this->when($request->is('api/post/users'), function(){
            //             return PostResource::collection($this->posts);
            // }),
            
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,

            'token' => $this->when($this->token, $this->token),
            
            // 'api_token' => $this->when($request->is('api/register', function (){

            // }));
        ];

    }
}
