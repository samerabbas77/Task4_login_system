@extends('layouts.app')
@section('title') Edit Admin @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Admin') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('admin.update',$user->id)}}">
                        @csrf 
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"> Name :</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="{{$user->name}}"  >

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
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{$user->email}}" autocomplete="email">

                                @if ($errors->any())
                                <div class="" style="color: blue">
                                    <ul>
                                        @if ($errors->has('email'))
                                            <li>{{  $errors->first('email')}}</li>
                                         @endif
                                    </ul>
                                </div>
                            @endif

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" value=""  autocomplete="new-password">

                                @if ($errors->any())
                                <div class="" style="color: blue">
                                    <ul>
                                        @if ($errors->has('password'))
                                            <li>{{  $errors->first('password')}}</li>
                                         @endif
                                    </ul>
                                </div>
                            @endif

                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="" autocomplete="new-password">
                                
                                @if ($errors->any())
                                <div class="" style="color: blue">
                                    <ul>
                                        @if ($errors->has('password-confirm'))
                                            <li>{{  $errors->first('password-confirm')}}</li>
                                         @endif
                                    </ul>
                                </div>
                            @endif
                        </div>
                            
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Admin') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-3">
                                                <form style="display: inline;" method="POST" action="{{route('admin.destroy',$user->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger col-md-6 offset-md-4" onclick="return confirm('Delete  the selected  Record permanently?' )">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (\Session::has('message1'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message1') !!}</li>
        </ul>
    </div>
@endif    
@endsection
