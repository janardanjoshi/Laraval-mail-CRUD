@extends('layout.main')
@push('title')
	<title>Home</title>
@endpush
@section('main-section')
{{-- <p class="h2 text-center">
	Home page
</p> --}}
<div class="card-body text-white">
	<p class="h2 text-center">{{ $titel ?? ''}}</p>
</div>
<p class="h4 text-center">This page is cerated with Laravel</p>
<a href="{{ url('/mail') }}" class="btn btn-info">Send mail</a>
@endsection