@extends('layouts.app')

@section('content')

    <div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <form action="{{route('users.index')}}">
		<div class="row">

			<div class="col-md-6">
                <div class="form-check"> 
                    <input type="radio" name="roles" class="form-check-input" value="OWNER" id="owner" {{Request::get('roles') == 'OWNER' ? 'checked' : ''}}>
                    <label for="owner" class="form-check-label">Owner</label>
                </div>

                <div class="form-check"> 
                    <input type="radio" name="roles" class="form-check-input" value="ADMIN" id="admin" {{Request::get('roles') == 'ADMIN' ? 'checked' : ''}}>
                    <label for="admin" class="form-check-label">Admin</label>
                </div>

				<input type="submit" value="Filter" class="btn btn-primary" name="">

			</div>

		</div>
	</form>

    <div class="col-md-12 text-right">
		<a href="{{route('users.create')}}" class="btn btn-primary">Create User</a>
		<a href="{{route('users.inactive')}}" class="btn btn-danger">Inactive User</a>
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
						<a class="btn btn-info text-white btn-sm" href="{{route('users.edit', ['id'=>$user->id])}}">Edit</a>
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