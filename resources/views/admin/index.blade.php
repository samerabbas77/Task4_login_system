@extends('layouts.app')
@section('title') Index @endsection
@section('content')

@can('view',Auth::user())
  <nav class="navbar navbar-light justify-content-center fs-3 mb-2  " style="background-color: #00ff5573">
      <div class="text-center ">
       
        <a href="{{route('user.create')}}" class="btn btn-success">Create Employee</a>
        <a href="{{route('admin.create')}}" class="btn btn-success">Create Admin</a>
        
      </div>  
           
        </nav> 
        
        <nav class="navbar navbar-light justify-content-center fs-3 mb-2  " style="background-color: #00ff5573">
          <div class="text-center ">
@endcan  
        @can('view',Auth::user())  
            <select name="employee_creator" class="form-control" id="adminSelect">
                <option value="" class="form-control mb-1" > Select employee Creator :</option>           
                @foreach($users as $user)
                    @if($user->is_admin == 1)        
                    <option value="{{route('admin.edit',$user->id)}}" >{{$user->name}}</option>               
                    @endif
                @endforeach
            </select> 
            <button onclick="goToPage()"  class="btn btn-warning" >ُEdit Admin</button>   
            <script>
              function goToPage() {
                  var selectElement = document.getElementById("adminSelect");
                  var selectedAdmin = selectElement.value;
                  
                  if (selectedAdmin) {
                      window.location.href = selectedAdmin;
                  } else {
                      alert("Please Choose Admin First From (Select employee Creator) Below !");
                  }
              }
              </script>
          </select>
        @endcan 

            </span>
          </div>             
      </nav> 
     

<nav class="navbar navbar-light justify-content-center fs-3 mb-2" style="background-color: #00ff5573">
     <h1> Employee List </h1> 
           
</nav  >
<header class="d-flex justify-content-between my4"> </header>
<nav style="background-color: #00ff5573">
  <form action="{{route('admin.showMulti')}}" method ="POST">
    @csrf
    <input type="text" autocomplete="off" name="search" class="input mb-2" placeholder="Enter Employee Name.."> 
    <input type="submit" autocomplete="off" name="text" class="btn btn-success" placeholder="Enter " value="Search"> 
  </form>
</nav> 
</header>



<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">N.</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Date oF Start</th>
      <th scope="col">Salary</th>
      <th scope="col">Created By</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <tr>
    @php ($i = 0)
   
          @foreach($employees as $employee)
              <td> {{++$i}}</td>

              <td>{{$employee->name}}</td>

              <td>{{$employee->address}}</td>

              <td>{{$employee->date_of_start}}</td>

              <td>{{$employee->salary}}</td>

              <td>{{$employee->user ? $employee->user->name : 'not found'}}</td>
                 
              <td>
                  @can('view',Auth::user())  
                  <a href="{{route('user.edit',$employee->id)}}" class="btn btn-warning">Edit</a>
                  @endcan
                  <a href="{{route('user.show',$employee->id)}} " class="btn btn-info">Read More</a>
                  
                  @can('view',Auth::user()) 
                  <form style="display: inline;" method="POST" action="{{route('user.destroy',$employee->id)}}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Delete  the selected  Record permanently?' )">Delete</button>
                  </form>
                  @endcan
            </td>
            </tr>
          @endforeach
  </tbody>
</table>
@if (Session::has('message'))
<div class="alert alert-info">
  {{ Session::get('message') }}
</div>
@endif  

  @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
 @endif
    @if (\Session::has('successDelete'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('successDelete') !!}</li>
        </ul>
    </div>
    @endif
@endsection


