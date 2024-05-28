<?php

namespace App\Http\Controllers\Api;


use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;
use App\Exceptions\UserNotFoundException;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\PostResource\PostIndexResource;
use App\Http\Resources\UserResource\UserPhoneResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->firstOrFail();

        
     
        if (! $user || ! Hash::check($request->password, $user->password)) {

            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        $token =  $user->createToken($request->name)->plainTextToken;

    
        return new UserResource($user, $token);
    }



    public function destroy($id) {

       $user = User::findOrFail($id);
        $user->tokens()->delete();

    }

    public function showRegister($id)
    {
        

        // 1st Way
        // $user = User::find($id);
        
        // if(!$user)
        // {
        //     abort(404, 'user not found');
        // }
        // return $user;


        // 2nd way
            // in order to return Exception , one must use findorfail / firstorfail, bcz these methods return by default 404 page.
            // if you dont use these mehtods then Exception is not caught.

        try{
            $user = User::findOrFail($id);
        }

        // this type of - \Exception -  is used to catch every type of exception. its a general exception.
        catch(\Exception $e)
        {
            // dd(get_class($e));       to get the class
            // dd($e->getMessage());    to get error message
            // return view('error.404)
            // or
            // return response()->json();
        }
        catch(ModelNotFoundException $e)
        {
            // return json()
            // return view()
        }
        catch(RelationNotFoundException $e)
        {
            // return 
        }


        // 3rd Way of catching Exception is by using Service Class 
        try {
            $user = (new UserService())->findByUsername($id);

        // } catch (ModelNotFoundException $e){
        } catch (UserNotFoundException $e) { 
            return view('users.notfound', ['error' => $e->getMessage()]);
        }
            return view('user.show', compact('user'));


    }








    // API RESOURCE METHODS


    public function index()
    {
        
        return UserResource::collection(User::all());
        // return UserResource::collection(User::paginate(5));


        // for MAP or APPEND
        // return user::select(['id', 'name', 'created_at'])->append('registered');

        // for Service Class of user
        // $users = $this->userService->getAllUsers();
            // return response()->json($users);

        
    }


    public function post()
    {
        
        return UserResource::collection(User::all());
        
        
    }


    public function show($user)
    {
        
        return new UserResource(User::findorfail($user));
    }

    public function phone($user)
    {
        return new UserPhoneResource(User::findorfail($user));

        // return UserPhoneResource::collection(User::all());
    }

    public function phones()
    {
        return  UserPhoneResource::collection(User::all());

    }


    public function postComment()
    {
        return PostIndexResource::collection(Post::all());

        // return new PostIndexResource(Post::find(3));
        
    }


}
