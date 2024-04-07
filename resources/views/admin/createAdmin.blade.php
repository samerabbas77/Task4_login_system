@extends('layouts.app')
@section('title') Add Admin @endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Admin') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('admin.store')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"> Name :</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}"  >

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
                                <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" autocomplete="email">

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
                                <input id="password" type="password" class="form-control " name="password"  autocomplete="new-password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                
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


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Admin') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
