@extends('layout.main')
@push('title')
<title>Registration</title>
@endpush
@section('main-section')
	{!! Form::open([
		'url' => $url,
		'method' => 'post',
		'enctype' => 'multipart/form-data',
		'class' => 'p-2 '
	]) !!}
	<p class="h4 text-center">{{$titel ?? ''}}</p>

	<div class="form-group col-6">
		<label for="">Name</label>
		{!! Form::text('name',$edit->name ?? '',['class'=> "form-control"]) !!}
		<span class="text-danger">
			@error('name')
			{{$message}}
			@enderror
		</span><br>
		<label for="">Email</label>
		<input type="email" name="email" id="" class="form-control" value="{{$edit->email ?? ''}}">
		<span class="text-danger">
			@error('email')
			{{$message}}
			@enderror
		</span><br>
		<label for="">Password</label>
		<input type="password" name="password" id="" class="form-control" value="">
		<span class="text-danger">
			@error('password')
			{{$message}}
			@enderror
		</span><br>
		<label for="">Confirm Password</label>
		<input type="password" name="password_confimation" id="" class="form-control" value="">
		<span class="text-danger">
			@error('password_confimation')
			{{$message}}
			@enderror
		</span><br>
		<label for="">Address</label>
		<textarea name="address" id="" cols="60" rows="5">{{$edit->address ?? ''}}</textarea>
		<span class="text-danger">
			@error('address')
			{{$message}}
			@enderror
		</span><br>
		<label for="">Gender: </label><br>
		<input class="form-check-input m-1" type="radio" name="gender" id="" value="M"
			{{(isset($edit) && ($edit->gender == 'M')?'checked':'')}}>
		<label class="form-check-label" for="">Male</label>

		<input class="form-check-input m-1" type="radio" name="gender" id="" value="F"
			{{(isset($edit) &&($edit->gender == 'F')?'checked':'')}}>
		<label class="form-check-label" for="">Female</label>

		<input class="form-check-input m-1" type="radio" name="gender" id="" value="O"
			{{(isset($edit) &&($edit->gender == 'O')?'checked':'')}}>
		<label class="form-check-label" for="">Other</label><br>
		<span class="text-danger">
			@error('gender')
			{{$message}}
			@enderror
		</span><br>
		<label for="">Date of Birth</label>
		<input type="date" name="dob" id="" class="form-control" value="{{$edit->dob ?? ''}}">
	</div>
	<button class="btn btn-info m-2">
		Submit
	</button>
	{!! Form::close() !!}
@endsection
