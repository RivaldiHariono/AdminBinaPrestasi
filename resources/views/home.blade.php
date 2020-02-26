@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br><br>
                    @if(Auth::user()->roles == "OWNER")
                    <a class="btn btn-primary mr-4" href="{{ url('/users') }}">
                        Users
                    </a>
                    @endif

                    <a class="btn btn-info mr-4" href="{{ url('/students') }}">
                        Students
                    </a>
                    <a class="btn btn-primary" href="{{ url('/teachers') }}">
                        Teachers
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
