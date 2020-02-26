@extends('layouts.app')

@section('content')

<div class="container">
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
    <form action="{{route('students.update',['id'=>$student->id])}}" method="POST" class="bg-white shadow-sm p-3">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Full Name" id="name" value="{{$student->name}}">

        <br>

        <label for="">Status</label> 
        <br/>
        <div class="form-check"> 
            <input {{$student->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-check-input"      id="active" name="status">  
            <label for="active" class="form-check-label mr-5">Active</label>      

            <input {{$student->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-check-input" id="inactive" name="status">
            <label for="inactive" class="form-check-label">Inactive</label>       
            <br>
        </div>

        <label for="">Jurusan</label> 
        <br/>
        <div class="form-check">  
            <input {{$student->jurusan == "IPA" ? "checked" : ""}} value="IPA" type="radio" class="form-check-input" id="IPA"      name="jurusan">      
            <label for="jurusan" class="form-check-label mr-5">IPA</label>  
            
            <input {{$student->jurusan == "IPS" ? "checked" : ""}} value="IPS" type="radio" class="form-check-input" id="IPS"      name="jurusan">      
            <label for="jurusan" class="form-check-label">IPS</label>  
        </div>
        
        <br>

        <label for="">Kelas</label> 
        <br/>
        <div class="form-check">  
            <input {{$student->kelas == "10" ? "checked" : ""}} value="10" type="radio" class="form-check-input" id="10"      name="kelas">      
            <label for="kelas" class="form-check-label mr-5">10</label>  

            <input {{$student->kelas == "11" ? "checked" : ""}} value="11" type="radio" class="form-check-input" id="11"      name="kelas">      
            <label for="kelas" class="form-check-label mr-5">11</label>  

            <input {{$student->kelas == "12" ? "checked" : ""}} value="12" type="radio" class="form-check-input" id="12"      name="kelas">      
            <label for="kelas" class="form-check-label">12</label>  
        </div>
        
        <br>

        <label for="address">Address</label><br>
        <input value="{{$student->address}}" type="text" name="address" class="form-control" id="address">

        <br>

        <label for="phone">Phone Number</label><br>
        <input value="{{$student->phone}}" type="text" name="phone" class="form-control" id="phone">

        <br>

        <input type="submit" class="btn btn-primary" value="Save">
        <a href="{{route('students.index')}}" class="btn btn-secondary ml-2">Cancel</a>

    </form>
</div>


@endsection