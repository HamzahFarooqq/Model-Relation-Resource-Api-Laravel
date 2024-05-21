<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/









// require __DIR__.'/auth.php';


// route::get('users/list', [Controller::class, 'list'])->middleware('auth');





// API RESOURCE 
route::get('user/{id}/resource', [Controller::class, 'userResource']);
route::get('comment/{id}/resource', [CommentController::class, 'commentResource']);



// HELPER MEHTOD RETURNS ALL HELPER 
route::get('helper', [Controller::class, 'helper'])->middleware('post.middle');










// ONE TO ONE 

route::get('users/{user}/phone', [Controller::class, 'showUserPhone']);
route::get('phone/{phone}/user', [PhoneController::class, 'showPhoneUser']);

// ONE TO MANY 

route::get('post/{post}/comment', [PostController::class, 'postComment']);
route::get('post/comment', [PostController::class, 'postComments']);
route::post('post/{post}/addcomment', [PostController::class, 'addComment']);
route::get('comment/{comment}/post', [CommentController::class, 'commentPost']);

// route::get('users/phone', [Controller::class, 'showUserPhone']);



// MANY TO MANY 

route::post('create/user', [Controller::class, 'create']);
route::get('user/{user}/role', [Controller::class, 'userRole']);
route::get('users/{user}/roles', [Controller::class, 'usersRoles']);