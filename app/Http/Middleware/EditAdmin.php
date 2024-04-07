<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class EditAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
     
        $validated = $request->validate([
            'name' => [ 'string', 'max:255'],
            'email' => ['sometimes','string','email','max:255', Rule::unique('users')->ignore($request->route('user'))],
            'password' => 'sometimes|nullable|confirmed|min:6'        
        ]);

        if($request->method()=="POST"){
            $rules['password']='sometimes|required|string|min:6';
           $rules['passwordConfirm']='sometimes|required_with:password|same:password';
           $rules['email']='sometimes|string|email| max:255';

           }
        return $next($request);
    }
}
