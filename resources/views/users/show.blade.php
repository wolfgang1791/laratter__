@extends('layout.app')

@section('content')
	<h1>{{$user->name}}</h1>
	<div class="row">
	@foreach($user->messages as $message)
		<div class="col-md-6">
			@include("messages.messages")
		</div>
	@endforeach
	</div>
@endsection