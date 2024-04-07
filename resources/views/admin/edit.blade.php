
@extends('layouts.app')

@section('title') Edit @endsection

@section('content')

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
            

       
   
    
    <form  method="POST" action="{{route('user.update',$employee->id)}}" >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name :</label>
            <input name="name" type="text" class="form-control" value="{{$employee->name}}">

            @if ($errors->any())
            <div class="" style="color: blue">
                <ul>
                    @if ($errors->has('name'))
                        <li>{{  $errors->first('name')}}</li>
                     @endif
                </ul>
            </div>
        @endif

        </div>

        <div class="mb-3">
            <label  class="form-label">Address :</label>
            <input name="address" type="text" class="form-control" value="{{$employee->address}} ">      

            @if ($errors->any())
            <div class="" style="color: blue">
                <ul>
                    @if ($errors->has('address'))
                        <li>{{  $errors->first('address')}}</li>
                     @endif
                </ul>
            </div>
        @endif
        </div>
        <div class="mb-3">
            <label  class="form-label">Date Of Statrt :</label>
            <input name="date_of_start" type="date" class="form-control" value="{{$employee->date_of_start}}">
            @if ($errors->any())
            <div class="" style="color: blue">
                <ul>
                    @if ($errors->has('date_of_start'))
                        <li>{{  $errors->first('date_of_start')}}</li>
                     @endif
                </ul>
            </div>
            @endif

        </div>
        <div class="mb-3">
            <label  class="form-label">Salary:</label>
            <input name="salary" type="numper" class="form-control" value="{{$employee->salary}}">

            @if ($errors->any())
            <div class="" style="color: blue">
                <ul>
                    @if ($errors->has('salary'))
                        <li>{{  $errors->first('salary')}}</li>
                     @endif
                </ul>
            </div>
        @endif
 

        <div class="mb-3">
            <label  class="form-label">employee Creator :</label>
            <select name="employee_creator" class="form-control">
                <option value="">Select employee Creator:</option> 
                
                @foreach($users as $user)
                    @if($user->is_admin == 1)        
                    <option value="{{$user->id}}" @selected($employee->user_id == $user->id)>{{$user->name}}</option>   
                    
                    @endif
                @endforeach

                @if ($errors->any())
                <div class="" style="color: blue">
                    <ul>
                        @if ($errors->has('employee_creator'))
                            <li>{{  $errors->first('employee_creator')}}</li>
                         @endif
                    </ul>
                </div>
            @endif
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>


@endsection
