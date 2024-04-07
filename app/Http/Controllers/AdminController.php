<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\updateAdminRequest;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }
    

    public function create()
    {
        $employees = Employee::all();
        $users = User::all();

        return view('admin.createAdmin', ['employees' => $employees],['users'=> $users]);
    } 



    public function store(StoreAdminRequest $request,User $dbemployee)
    {
        //2.store the data in datatbase
        $dbemployee ->name = $request['name'];
        $dbemployee ->email = $request['email'];
        $dbemployee ->password = Hash::make($request['password']); 
        $dbemployee->is_admin = 1; 

        $dbemployee->save();

        //3.redirict to employee.index
        return to_route('user.index');
    }

   
    public function edit(User $admin)
    {
        
        return view ('admin.editAdmin',['user'=> $admin]);
    }

    public function update(User $admin ,updateAdminRequest $request)
    {
        
        //1.get the old record from DB
       // $admin = User::find($id);
       
        //4.update the data in datatbase
        $admin['name'] = $request->name; 
        $admin  ->email =  $request->email;
        if($request->password != null) $admin  ->password =  Hash::make($request['password']); 
        
        $admin->update();
        
        return to_route('user.index')->with('success', "You  Have Edit the Admin ($admin->name) Info Successfully :) ");

    }

    public function destroy($id)
    {
        $user_Destroy = User::find($id);
       // $name_of_admin = $user_Destroy->name;
       $users_n = User::all();
       $i =0;
       foreach($users_n as $one)
       {
        if($one->is_admin==1) $i++;
       }
       
        if($i == 1 )
        {   Session::flash('message1', "Its Not Godd Idea To Delete all Admens!!");
            return Redirect::back();
        }
        $user_Destroy->delete();

        return to_route('user.index')->with('successDelete', "You  Have Deleted the Admin ($user_Destroy->name  Successfully :) ");
    }

    public function showMulti(Request $request)
    {
        $employees_search = Employee::where('name','LIKE','%'.$request->search.'%')->get();
        $users = User::all();
      
        return view('admin.index' , ["employees"=>$employees_search,"users"=>$users]) ;
    }

}
