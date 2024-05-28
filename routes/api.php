<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PhoneController;
use App\Http\Controllers\Api\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });




// route::get('users', [UserController::class, 'index']);
// route::get('post/users', [UserController::class, 'post']);

// route::get('phone/users/{user}', [UserController::class, 'phone']);
// route::get('phone/users', [UserController::class, 'phones']);

// route::get('users/{user}', [UserController::class, 'show']);




// route::get('posts', [UserController::class, 'postComment'])->name('posts');

// route::get('phones/lists', [PhoneController::class, 'index']);






// user api resource route 

route::post('register', [usercontroller::class, 'register' ]);
route::delete('register/users/{id}', [usercontroller::class, 'destroy' ])->middleware('auth:sanctum');
route::get('register/users/{id}', [UserController::class, 'showRegister' ]);

route::apiResource('users', usercontroller::class );


// Post api resource route 
route::apiResource('posts', PostController::class);

// Comment api resource route 
route::apiResource('comments', CommentController::class);


// route::get('test', function() {
    //  return $currentdate = Carbon::now();
    //  return $currentdate = Carbon::parse('5-1-2024');
    //   return $currentdate->diffForHumans();
    // return $tomorrow = carbon::now()->addDay();

// });



