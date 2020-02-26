@extends('layouts.app')

@section('content')
<div class="container">
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
    <form action="{{route('students.store')}}" method="post" class="bg-white shadow-sm p-3">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Full Name" id="name" value="{{old('name')}}">
        
        @if($errors->first('name'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('name')}}
            </div>
        @endif

        <label for="kelas">Kelas</label>
                
        <br>
        
        <input type="radio" name="kelas" value="10" id="10">
        <label for="10">10</label>

        <input type="radio" name="kelas" value="11" id="11">
        <label for="11">11</label>

        <input type="radio" name="kelas" value="12" id="12">
        <label for="12">12</label>
        
        <br>

        @if($errors->first('kelas'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('kelas')}}
            </div>
        @endif


        <label for="jurusan">Jurusan</label>
                
        <br>
        
        <input type="radio" name="jurusan" value="IPA" id="IPA">
        <label for="IPA">IPA</label>

        <input type="radio" name="jurusan" value="IPS" id="IPS">
        <label for="IPS">IPS</label>
        
        <br>

        @if($errors->first('jurusan'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('jurusan')}}
            </div>
        @endif

        <br>

        <label for="address">Address</label><br>
        <input value="{{old('address')}}" type="text" name="address" class="form-control" id="address">

        @if($errors->first('address'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('address')}}
            </div>
        @endif

        <br>

        <label for="phone">Phone Number</label><br>
        <input value="{{old('phone')}}" type="text" name="phone" class="form-control" id="phone">

        @if($errors->first('phone'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('phone')}}
            </div>
        @endif

        <br>

        <input type="submit" class="btn btn-primary" value="Save">

    </form>
</div>
@endsection