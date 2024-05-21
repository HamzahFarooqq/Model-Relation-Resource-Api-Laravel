<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use function App\detail;
use Illuminate\Http\Request;
use function App\generateToken;
use App\Http\Resources\UserResource;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RegisteredUserNotification;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    function list()
    {
        return User::all();
    }

    function userResource($id)
    {
        return new UserResource(User::findOrFail($id));
    }


    function create(Request $req)
    {
        $user = user::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
        ]);

        $manageradmin = Role::where('role', 'manager')->get();
        

        if($manageradmin)
        {
            foreach ($manageradmin as $madmin)
            {
                 $manager = $madmin->users;

            }
        }

        
        Notification::send($manager, new RegisteredUserNotification($user));

        // event(new Registered($user));

        return view('single');


    }





    // function create (Request $req)
    // {

    //     // dd($req);

    //      $user = User::create([
    //         'name'=> $req->name,
    //         'email'=> $req->email,
    //         'password'=> $req->password,
    //     ]);

    //     $phone = $user->phone()->create([
    //         'phone'=> $req->phone
    //     ]);

    //     return $phone;

    // }



    function showUserPhone($user)
    {
        
        $phone = user::find($user)->phone;
        $user = user::find($user);

        return response()->json([
            'phone'=> $phone,
            'user' => $user
        ]);
    }

    // function showUserPhone()
    // {
        
    //     $user = user::all()->phone;
    //     // $user->phone;

    //     return response()->json([
    //         'user'=> $user,
    //         // 'phone' => $phone
    //     ]);
    // }


        function userRole($user)
        {
            
            $user = user::find($user);
            
            

            // return $user->roles()->orderBy('role')->get();

            // foreach ($user->roles as $role) {
            
            //     // $data[] = $role->pivot;

            //     echo $role->pivot->role_id;
            // }

            // return response()->json([
            //     'user_roles' => $data,
            // ]);

        }

        function usersRoles($user)
        {
            // $user = user::with('roles')->get();          Eager Loading
            // return $user;


            $user = user::find($user)->roles;
            return $user;

        }




        
        // function helper()
        // {
            // $token = generateToken(5);
            // return $token;

            

            // -- other controller method 

        //     $role = new RoleController();
        //    return  $role->list();
 
        // }



               


}
