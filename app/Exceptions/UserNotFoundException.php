<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    

    public function report(): void
    {
        // ...
    }
 
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): Response
    {
        // return response(/* ... */);

            return view('error.usernotfound');
    }

}
