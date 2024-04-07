<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\updateUserRequest;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }
    public function index()
    {
        //Read data from DtaBase
        $allfromDB = Employee::all();//Collection of objects
        $users = User::all();
        return view('admin.index',['employees' => $allfromDB ],['users'=> $users]); 
    }


    public function show(Employee $user)
    {
        //All the below is a way to fetch Row from DB(SELECT * From  WHERE id= '')
        //get the id of the row
        //$sigleemployee = employee::find($id);//sigle object(model object)
        //$single = employee::where('id',$id)->first();
        //$single = employee::where('id',$id)->get();
        //  @dd($sigleemployee);
        return view('admin.show',['employeeshow'=> $user]);
    }

    public function create()
    {
        //select * from employees;
        $employees = Employee::all();
        $users = User::all();

        return view('admin.create', ['employees' => $employees],['users'=> $users]);
    } 

    public function store(StoreUserRequest $user)
    {
        
        $dbemployee = new Employee();

        $dbemployee ->name = $user['name'];
        $dbemployee ->address = $user['address'];
        $dbemployee ->date_of_start = $user['date_of_start'];
        $dbemployee ->salary = $user['salary'];
       
        $dbemployee->user_id = $user['employee_creator']; 

        $dbemployee->save();

        //3.redirict to employee.index
        return to_route('user.index');
    }

    public function edit(Employee $user)
    {
        //select * from employees;
        // $employees = Employee::all();
        $users = User::all();

        return view ('admin.edit',['users'=> $users],['employee'=> $user]);
    }

    public function update(Employee $user ,updateUserRequest $request)
    {
        //1.get employee data from the form
        //$data = request()->all();
        
        //3. get the data from DB
        // $user = Employee::find($id);
        //4.update the data in datatbase
        $user ->name = $request->name; //$data['name'];
        $user ->address =  $request->address;
        $user ->date_of_start =  $request->date_of_start; 
        $user ->salary =  $request->salary; 
        $user ->user_id = $request->employee_creator; 
        
        $user->update();

        //3.redirict to employee.show
        return to_route('user.index');
    }


    public function destroy($id)
    {        
       
            //1 -select or find the post
            $employee =Employee::find($id);
            //chk if the employee is last employee in DataBase
            if(Employee::count() == 1 )
                {   Session::flash('message', "Its Not Godd Idea To Delete all Employees!!");
                    return Redirect::back();
                }
            //3- delete the post from database
            $employee->delete();

        // employee::where('id', $id)->delete();
       
        return to_route('user.index');
    }
  

}
