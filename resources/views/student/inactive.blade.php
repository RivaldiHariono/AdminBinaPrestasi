@extends('layouts.app')

@section('content')

    <div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <div class="col-md-12 text-right">
		<a href="{{route('students.index')}}" class="btn btn-primary">Active Student</a>
	</div>

    <br>

    <table class="table table-bordered mx-auto">
		<thead>
			<tr>
				<th><b>No</b></th>
				<th><b>Name</b></th>
				<th><b>Jurusan</b></th>
                <th><b>Kelas</b></th>
				<th><b>Status</b></th>
				<th><b>Action</b></th>
			</tr>
		</thead>
		<tbody>
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
						<form onsubmit="return confirm('Delete this student permanently?')" class="d-inline"    action="{{route('students.destroy', ['id' => $student->id ])}}" method="POST">
						    @csrf
						    <input type="hidden" name="_method" value="DELETE">
						    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
						</form>
                    
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