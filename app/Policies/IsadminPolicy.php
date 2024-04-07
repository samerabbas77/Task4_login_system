<?php

namespace App\Policies;

use App\Models\User;

class IsadminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user)
    {
      
       if($user->is_admin  == 1) return true;   
         // or false based on your authorization logic
         if($user->is_admin  == 0) return false;
        
    }
}
