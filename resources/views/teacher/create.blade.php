@extends('layouts.app')

@section('content')
<div class="container">
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
    <form action="{{route('teachers.store')}}" method="post" class="bg-white shadow-sm p-3">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Full Name" id="name" value="{{old('name')}}">
        
        @if($errors->first('name'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('name')}}
            </div>
        @endif
        
        <br>

        <label for="pelajaran">Mata Pelajaran</label>
                
        <br>
        
        <p class="font-weight-bold">Umum</p>
        <input type="checkbox" name="pelajaran[]" value="Matematika" id="Matematika">
        <label for="Matematika">Matematika</label>

        <input type="checkbox" name="pelajaran[]" value="Bahasa Indonesia" id="Bahasa Indonesia">
        <label for="Bahasa Indonesia">Bahasa Indonesia</label>

        <input type="checkbox" name="pelajaran[]" value="Bahasa Inggris" id="Bahasa Inggris">
        <label for="Bahasa Inggris">Bahasa Inggris</label>

        <p class="font-weight-bold">IPA</p>
        <input type="checkbox" name="pelajaran[]" value="Kimia" id="Kimia">
        <label for="Kimia">Kimia</label>

        <input type="checkbox" name="pelajaran[]" value="Fisika" id="Fisika">
        <label for="Fisika">Fisika</label>

        <input type="checkbox" name="pelajaran[]" value="Biologi" id="Biologi">
        <label for="Biologi">Biologi</label>

        <p class="font-weight-bold">IPS</p>
        <input type="checkbox" name="pelajaran[]" value="Geografi" id="Geografi">
        <label for="Geografi">Geografi</label>

        <input type="checkbox" name="pelajaran[]" value="Ekonomi" id="Ekonomi">
        <label for="Ekonomi">Ekonomi</label>

        <input type="checkbox" name="pelajaran[]" value="Sosiologi" id="Sosiologi">
        <label for="Sosiologi">Sosiologi</label>
        
        <br>

        @if($errors->first('pelajaran'))
            <div class="alert alert-danger mt-3">
                {{$errors->first('pelajaran')}}
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