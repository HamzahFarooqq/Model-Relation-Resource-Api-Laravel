<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    function showPhoneUser($phone)
    {
        // $user = Phone::find($phone)->user;

        $phone = phone::find($phone);

        $phone->user;


        return response()->json([
            
            'phone' => $phone
        ]);
    }
}
