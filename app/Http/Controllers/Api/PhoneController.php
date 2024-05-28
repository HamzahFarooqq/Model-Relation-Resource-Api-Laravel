<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\User;
use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\PhoneResource\PhoneResource;
use App\Http\Resources\PostResource\PostIndexResource;
use App\Http\Resources\UserResource\UserPhoneResource;



class PhoneController extends Controller
{
    public function index()
    {
        
        // return PhoneResource::collection(User::all());

        // return UserResource::collection(User::all());

        // return new PhoneResource(Phone::find());


        

        $phones = Phone::with('user')->get();     // Eager load the 'user' relationship
        return PhoneResource::collection($phones);

        
    }


}
 