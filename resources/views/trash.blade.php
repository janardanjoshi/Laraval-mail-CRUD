@extends('layout.main')
@push('title')
<title>Customer Trashed Data</title>
@endpush
@section('main-section')
<div class="card-body">
	<p class="h2 text-center">
		Customer Trashed Data
	</p>
</div>
<div class="nav justify-content-end ">
	<a href="{{url('/emp/view')}}">
		<button class="btn btn-primary d-inline-block m-2 justify-content-end">Customer Records</button>
	</a>
	<a href="{{url('/emp')}}">
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
		@foreach ($data as $info)
		<tr>
			<td>{{$info->id}}</td>
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
				<a href="{{route('force-delete',[ 'id' => $info->id])}}"><button
						class="btn btn-danger">Delete</button></a>
				<a href="{{route('restor',[ 'id' => $info->id])}}"><button
						class="btn btn-primary">Restor</button></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
