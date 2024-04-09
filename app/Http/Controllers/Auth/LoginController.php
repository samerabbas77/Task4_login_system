<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user'; // if the login user is admin will go to index page

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
       
    }

    //ماني بحاجتها لانو عندي صفحة وحدة للادمن واليوذر بس اذا حبيت تقسم لصفحتين استخدمه..
    //وخلي الروت تبع صفحة اللوغ ان متل ماهو (login) 
    protected function login(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($validation))
        {
            $user = Auth::user()->is_admin;
            if($user == 1)
            {
                return redirect('/the rout you want');
            }
            if($user == 0)
            {
                return redirect('/the rout you want');
            }

        }else{
            return redirect ('/login');
        }
    }
}
