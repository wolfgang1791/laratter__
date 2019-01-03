@extends('layout.app')

@section('content')
	<h1>Message id: {{$message->id}}</h1>
	@include("messages.messages")
@endsection