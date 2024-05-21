<?php 

namespace App;

use Illuminate\Support\Str;


function generateToken($length)
{
    return Str::random($length);
}




function detail($detail_object)
{
    echo "<pre>";
    print_r($detail_object);
    echo "<pre>";
}