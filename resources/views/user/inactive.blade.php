@extends('layouts.app')

@section('content')

    <div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <div class="col-md-12 text-right">
		<a href="{{route('users.index')}}" class="btn btn-primary">Active User</a>
	</div>

    <br>

    <table class="table table-bordered mx-auto text-center">
		<thead>
			<tr>
				<th><b>Name</b></th>
				<th><b>Email</b></th>
                <th><b>Roles</b></th>
				<th><b>Status</b></th>
				<th><b>Action</b></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
                    <td>{{$user->roles}}</td>
					<td>
						@if($user->status == "ACTIVE")
							<span class="badge badge-success">{{$user->status}}</span>
						@else
							<span class="badge badge-danger">{{$user->status}}</span>
						@endif
					</td>
					<td>
						<form onsubmit="return confirm('Delete this user permanently?')" class="d-inline"    action="{{route('users.destroy', ['id' => $user->id ])}}" method="POST">
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
				<td colspan="10">
					{{$users->appends(Request::all())->links()}}
				</td>
			</tr>
		</tfoot>


	</table>
    
    
    </div>


@endsection