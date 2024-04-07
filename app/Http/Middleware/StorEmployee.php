<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StorEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'address' => ['required'],
            'date_of_start' => ['required'],
            'salary'=> ['required','numeric','min:150000'],
            'employee_creator' => ['required', 'exists:users,id'],
        ]);
    
        return $next($request);
    }
}
