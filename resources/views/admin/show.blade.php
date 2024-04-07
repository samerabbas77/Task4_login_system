
@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Employee Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name:  </h5>{{$employeeshow->name }}
            <h5><p class="card-text">Date of Start: </h5>{{$employeeshow->date_of_start}} </p>
            <h5><p class="card-text">Salary: </h5>{{$employeeshow->salary}} </p>
            <h5><p class="card-text">Created By: </h5>{{$employeeshow->user ? $employeeshow->user->name : 'not found'}} </p>
            <h5><p class="card-text">Adress: </h5>{{$employeeshow->address}}</p>
        </div>
            <!-- <h5 class="card-title">Name:  {{$employeeshow->employee ? $employeeshow->employee->name : ' not found'}}</h5>
            <p class="card-text">Email: {{$employeeshow->employee ? $employeeshow->employee->email: ' not found'}}</p>
            <p class="card-text">Role: {{$employeeshow->employee ? $employeeshow->employee->is_admin: ' not found'}} </p>
            <p class="card-text">Created At: {{$employeeshow->employee ? employeeshow->employee->created_at: ' not found'}} </p>
        </div> -->
    </div>
@endsection
