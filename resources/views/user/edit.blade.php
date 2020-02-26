@extends('layouts.app')

@section('content')

<div class="container">
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
    <form action="{{route('users.update',['id'=>$user->id])}}" method="POST" class="bg-white shadow-sm p-3" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Full Name" id="name" value="{{$user->name}}">
        
        <br>

        <label for="email">Email</label><br>
        <input value="{{$user->email}}" type="text" name="email" class="form-control" id="email">

        <br>

        <label for="">Status</label> 
        <br/>
        <div class="form-check"> 
            <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-check-input"      id="active" name="status">  
            <label for="active" class="form-check-label">Active</label>      
        </div>

        <div class="form-check"> 
            <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-check-input" id="inactive" name="status">
            <label for="inactive" class="form-check-label">Inactive</label>       
            <br>
        </div>

        <label for="">Roles</label> 
        <br/>
        <div class="form-check">  
            <input {{$user->roles == "OWNER" ? "checked" : ""}} value="OWNER" type="radio" class="form-check-input" id="owner"      name="roles">      
            <label for="owner" class="form-check-label">Owner</label>  
        </div>

        <div class="form-check"> 
            <input {{$user->roles == "ADMIN" ? "checked" : ""}} value="ADMIN" type="radio" class="form-check-input" id="admin" name="roles">      
            <label for="admin" class="form-check-label">Admin</label> 
        </div>
        
        <br>

        <label for="address">Address</label><br>
        <input value="{{$user->address}}" type="text" name="address" class="form-control" id="address">

        <br>

        <label for="phone">Phone Number</label><br>
        <input value="{{$user->phone}}" type="text" name="phone" class="form-control" id="phone">

        <br>

        <input type="submit" class="btn btn-primary" value="Save">


    </form>
</div>


@endsection