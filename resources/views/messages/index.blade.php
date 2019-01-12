@extends("layouts.app")

@section("content")
	@foreach($messages as $message)
		@include("messages.messages")
	@endforeach
@endsection