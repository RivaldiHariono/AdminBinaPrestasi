@extends('layouts.app')

@section('content')

    <div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <form action="{{route('teachers.index')}}">
		<div class="row">

			<div class="col-md-6">
				<div class="input-group mb-3">
					<input type="text" name="keyword" value="{{Request::get('keyword')}}" class="form-control col-md-10" placeholder="Search by Name">
					<input type="submit" value="Search" class="btn btn-primary ml-4" name="">
				</div>
			</div>

		</div>
	</form>

    <div class="col-md-12 text-right">
		<a href="{{route('teachers.create')}}" class="btn btn-primary">Add Teacher</a>
		<a href="{{route('teachers.inactive')}}" class="btn btn-danger ml-2">Inactive Teacher</a>
	</div>

    <br>

    <table class="table table-bordered mx-auto text-center">
		<thead>
			<tr>
				<th><b>No</b></th>
				<th><b>Name</b></th>
				<th><b>Mata Pelajaran</b></th>
				<th><b>Status</b></th>
				<th><b>Action</b></th>
			</tr>
		</thead>
		<tbody>
			<tr>
			
			@foreach($teachers as $teacher1 => $teacher)
					<td>{{$teachers->firstItem() + $teacher1}}</td>
					<td>{{$teacher->name}}</td>
                    <td>{{$teacher->pelajaran}}</td>
                    <td>
						@if($teacher->status == "ACTIVE")
							<span class="badge badge-success">{{$teacher->status}}</span>
						@else
							<span class="badge badge-danger">{{$teacher->status}}</span>
						@endif
					</td>
					<td>
						<a class="btn btn-info text-white btn-sm" href="{{route('teachers.edit', ['id'=>$teacher->id])}}">Edit</a>
                    </td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="10" class="">
                    {{$teachers->appends(Request::all())->links()}}
				</td>
			</tr>
		</tfoot>


	</table>
    
    
    </div>


@endsection