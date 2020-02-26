@extends('layouts.app')

@section('content')
<div class="container">
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
    <form action="{{route('users.store')}}" method="post" class="bg-white shadow-sm p-3">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Full Name" id="name" value="{{old('name')}}">
        
        @if($errors->first('name'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('name')}}
            </div>
        @endif

        <label for="email">Email</label><br>
        <input value="{{old('email')}}" type="text" name="email" class="form-control" id="email">

        @if($errors->first('email'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('email')}}
            </div>
        @endif

        <label for="password">Password</label><br>
        <input type="password" name="password" class="form-control" id="password">

        @if($errors->first('password'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('password')}}
            </div>
        @endif

        <label for="password_confirmation">Password Confirmation</label><br>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">

        @if($errors->first('password_confirmation'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('password_confirmation')}}
            </div>
        @endif

        <label for="roles">Roles</label>
                
        <br>
        
        <input type="radio" name="roles" value="ADMIN" id="ADMIN">
        <label for="ADMIN">Administrator</label>
        
        <br>

        <label for="address">Address</label><br>
        <input value="{{old('address')}}" type="text" name="address" class="form-control" id="address">

        @if($errors->first('roles'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('roles')}}
            </div>
        @endif

        <label for="phone">Phone Number</label><br>
        <input value="{{old('phone')}}" type="text" name="phone" class="form-control" id="phone">

        @if($errors->first('phone'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('phone')}}
            </div>
        @endif

        <input type="submit" class="btn btn-primary" value="Save">

    </form>
</div>
@endsection