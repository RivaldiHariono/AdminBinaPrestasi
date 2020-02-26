@extends('layouts.app')

@section('content')

    <div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

	<div class="row">
		<div class="col-md-9 ">
			<form action="{{route('students.index')}}">
				<div class="row">

					<div class="col-md-6">
						<div class="input-group mb-3">
							<input type="text" name="keyword" value="{{Request::get('keyword')}}" class="form-control col-md-10" placeholder="Search by Name">
							<input type="submit" value="Search" class="btn btn-primary ml-4" name="">
						</div>
					</div>

				</div>
			</form>
		</div>

		<div class="col-md-3">
			<a href="{{route('students.create')}}" class="btn btn-primary">Add Student</a>
			<a href="{{route('students.inactive')}}" class="btn btn-danger ml-2">Inactive Student</a>
		</div>
	</div>

    <br>

    <table class="table table-bordered mx-auto">
		<thead>
			<tr class="text-center">
				<th><b>No</b></th>
				<th><b>Name</b></th>
				<th><b>Jurusan</b></th>
                <th><b>Kelas</b></th>
				<th><b>Status</b></th>
				<th><b>Action</b></th>
			</tr>
		</thead>
		<tbody class="text-center">
			<tr>
			
			@foreach($students as $student1 => $student)
					<td>{{$students->firstItem() + $student1}}</td>
					<td>{{$student->name}}</td>
					<td>{{$student->jurusan}}</td>
                    <td>{{$student->kelas}}</td>
					<td>
						@if($student->status == "ACTIVE")
							<span class="badge badge-success">{{$student->status}}</span>
						@else
							<span class="badge badge-danger">{{$student->status}}</span>
						@endif
					</td>
					<td>
						<a class="btn btn-info text-white btn-sm center" href="{{route('students.edit', ['id'=>$student->id])}}">Edit</a>
                    </td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="10" class="">
                    {{$students->appends(Request::all())->links()}}
				</td>
			</tr>
		</tfoot>


	</table>
    
    
    </div>


@endsection