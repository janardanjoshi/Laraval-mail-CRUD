@extends('layout.main')
@push('title')
<title>{{ $titel ?? ''}}</title>
@endpush
@section('main-section')
<div class="card-body">
	<p class="h2 text-center">{{ $titel ?? ''}}</p>
</div>
@if(Session::has('success'))

<div class="alert alert-success">

	{{ Session::get('success') }}

	@php

		Session::forget('success');

	@endphp

</div>

@endif
<div class="container card-body">
	<div class="nav justify-content-end ">
		<form action="" class="m-2 d-inline-block col-4">
		<input type="search" name="search" id="" class="form-control" placeholder="Search" value="{{$search ?? ''}}">
		<button class="btn btn-info d-inline-block ">Go</button>
		<a href="{{url('/emp/view')}}">
		<button class="btn btn-info" type="button">Reset</button>
	</a>
	</form>
		<a href="{{route('trash')}}">
			<button class="btn btn-danger d-inline-block m-2 justify-content-end">Go to Trash</button>
		</a>
		<a href="{{ route ('emp.create') }}">
			<button class="btn btn-primary d-inline-block m-2 justify-content-end">Add</button>
		</a>
	</div>
	<table class="table text-light">
		<thead>
			<th>Sr.n</th>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Gender</th>
			<th>DOB</th>
			<th>Action</th>
		</thead>
		<tbody>
			@php
			$i=1;
			@endphp
			@foreach ($data as $info)
			<tr>
				<td>{{$i}}</td>
				<td>{{$info->name}}</td>
				<td>{{$info->email}}</td>
				<td>{{$info->address}}</td>
				<td>
					@if ($info->gender == "M")
					Male
					@elseif ($info->gender == "F")
					Female
					@else
					Other
					@endif

				</td>
				<td>{{$info->dob}}</td>
				<td>
					<form action="{{url('emp/'.$info->id.'')}}" method="POST" class="inline">
						@csrf
						@method ('DELETE')
						<button type="submit" class="btn btn-danger">Trash</button>
					</form>
					<a href="{{ url('emp/'.$info->id.'/edit')}}">
						<button class="btn btn-primary">Edit</button>
					</a>
				</td>
			</tr>
			@php
			$i++;
			@endphp
			@endforeach
		</tbody>
	</table>
	<div class="row text-centre">
		@if (isset($search))
		{!! isset($search) && $data->links() !!}
		@else
		{!! $data->links() !!}
		@endif
	</div>	
</div>
@endsection
