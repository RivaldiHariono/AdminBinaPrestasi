@extends('layouts.app')

@section('content')

    <div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <div class="col-md-12 text-right">
		<a href="{{route('teachers.index')}}" class="btn btn-primary">Active Teacher</a>
	</div>

    <br>

    <table class="table table-bordered mx-auto">
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
						<form onsubmit="return confirm('Delete this teacher permanently?')" class="d-inline"    action="{{route('teachers.destroy', ['id' => $teacher->id ])}}" method="POST">
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
                    {{$teachers->appends(Request::all())->links()}}
				</td>
			</tr>
		</tfoot>


	</table>
    
    
    </div>


@endsection