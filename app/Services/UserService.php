<?php

namespace App\Services;

use Exception;
use App\Models\User;
use App\Exceptions\UserNotFoundException;

class UserService
{
    // Exception Error
    public function findByUsername($id)
    {
        $user = User::where('id', $id)->first();

        if(!$user)
        {
            // throw new ModelNotFoundException(message: 'user not found by id'. $id );
            throw new UserNotFoundException(message: 'user not found by id'. $id );
        }

        return $user;
    }





    // Crud logic in Service Class for user

    public function getAllUsers()
    {
        return User::all();
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function updateUser($id, array $data)
    {
        $user = User::find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }


}