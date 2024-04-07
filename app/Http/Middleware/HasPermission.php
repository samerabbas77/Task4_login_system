<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {                  
         $validator = $request->validate( [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

      
           $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
           );
           
           if(Auth::attempt($user_data))
           {
                if(Auth::user()->is_admin == 1)
                {
                    //return to_route('admin.index');
                    return $next($request);
                }
                else
                {
                    return to_route('user.index');
                }
                  
           }
           else
           {
           
                return back()->with('error', 'Wrong Login Details');

           }
      
        
    }
}
