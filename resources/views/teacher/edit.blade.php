@extends('layouts.app')

@section('content')

<div class="container">
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
    <form action="{{route('teachers.update',['id'=>$teacher->id])}}" method="POST" class="bg-white shadow-sm p-3">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Full Name" id="name" value="{{$teacher->name}}">

        <br>

        @if($errors->first('name'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('name')}}
            </div>
        @endif

        <label for="">Status</label> 
        <br/>
        <div class="form-check"> 
            <input {{$teacher->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-check-input"      id="active" name="status">  
            <label for="active" class="form-check-label mr-5">Active</label>      

            <input {{$teacher->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-check-input" id="inactive" name="status">
            <label for="inactive" class="form-check-label">Inactive</label>       
            <br>
        </div>

        @if($errors->first('status'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('status')}}
            </div>
        @endif

        <label for="">Mata Pelajaran</label> 
        <br/>

        <div class="form-check">  
            <input type="checkbox"
            {{in_array("Matematika", json_decode($teacher->pelajaran)) ? "checked" : ""}} 
            name="pelajaran[]" 
            class="form-check-input {{$errors->first('pelajaran') ? "is-invalid" : "" }}"
            id="Matematika" 
            value="Matematika"> 
            <label for="Matematika" class="mr-4">Matematika</label>
            
            <input type="checkbox"
            {{in_array("Bahasa Indonesia", json_decode($teacher->pelajaran)) ? "checked" : ""}} 
            name="pelajaran[]" 
            class="form-check-input {{$errors->first('pelajaran') ? "is-invalid" : "" }}"
            id="Bahasa Indonesia" 
            value="Bahasa Indonesia"> 
            <label for="Bahasa Indonesia" class="mr-4">Bahasa Indonesia</label>

            <input type="checkbox"
            {{in_array("Bahasa Inggris", json_decode($teacher->pelajaran)) ? "checked" : ""}} 
            name="pelajaran[]" 
            class="form-check-input {{$errors->first('pelajaran') ? "is-invalid" : "" }}"
            id="Bahasa Inggris" 
            value="Bahasa Inggris"> 
            <label for="Bahasa Inggris" class="mr-4">Bahasa Inggris</label>

            <input type="checkbox"
            {{in_array("Biologi", json_decode($teacher->pelajaran)) ? "checked" : ""}} 
            name="pelajaran[]" 
            class="form-check-input {{$errors->first('pelajaran') ? "is-invalid" : "" }}"
            id="Biologi" 
            value="Biologi"> 
            <label for="Biologi" class="mr-4">Biologi</label>

            <input type="checkbox"
            {{in_array("Fisika", json_decode($teacher->pelajaran)) ? "checked" : ""}} 
            name="pelajaran[]" 
            class="form-check-input {{$errors->first('pelajaran') ? "is-invalid" : "" }}"
            id="Fisika" 
            value="Fisika"> 
            <label for="Fisika" class="mr-4">Fisika</label>

            <input type="checkbox"
            {{in_array("Kimia", json_decode($teacher->pelajaran)) ? "checked" : ""}} 
            name="pelajaran[]" 
            class="form-check-input {{$errors->first('pelajaran') ? "is-invalid" : "" }}"
            id="Kimia" 
            value="Kimia"> 
            <label for="Kimia" class="mr-4">Kimia</label>

            <input type="checkbox"
            {{in_array("Sosiologi", json_decode($teacher->pelajaran)) ? "checked" : ""}} 
            name="pelajaran[]" 
            class="form-check-input {{$errors->first('pelajaran') ? "is-invalid" : "" }}"
            id="Sosiologi" 
            value="Sosiologi"> 
            <label for="Sosiologi" class="mr-4">Sosiologi</label>

            <input type="checkbox"
            {{in_array("Geografi", json_decode($teacher->pelajaran)) ? "checked" : ""}} 
            name="pelajaran[]" 
            class="form-check-input {{$errors->first('pelajaran') ? "is-invalid" : "" }}"
            id="Geografi" 
            value="Geografi"> 
            <label for="Geografi" class="mr-4">Geografi</label>

            <input type="checkbox"
            {{in_array("Ekonomi", json_decode($teacher->pelajaran)) ? "checked" : ""}} 
            name="pelajaran[]" 
            class="form-check-input {{$errors->first('pelajaran') ? "is-invalid" : "" }}"
            id="Ekonomi" 
            value="Ekonomi"> 
            <label for="Ekonomi" class="mr-4">Ekonomi</label>

        </div>
        
        <br>

        @if($errors->first('pelajaran'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('pelajaran')}}
            </div>
        @endif

        <label for="address">Address</label><br>
        <input value="{{$teacher->address}}" type="text" name="address" class="form-control" id="address">

        @if($errors->first('address'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('address')}}
            </div>
        @endif

        <br>

        <label for="phone">Phone Number</label><br>
        <input value="{{$teacher->phone}}" type="text" name="phone" class="form-control" id="phone">

        @if($errors->first('phone'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('phone')}}
            </div>
        @endif

        <br>

        <input type="submit" class="btn btn-primary" value="Save">
        <a href="{{route('teachers.index')}}" class="btn btn-secondary ml-2">Cancel</a>

    </form>
</div>


@endsection