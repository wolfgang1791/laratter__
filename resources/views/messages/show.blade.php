@extends('layouts.app')

@section('content')
	<h1>Message id: {{$message->id}}</h1>
	@include("messages.messages")
	<response :message="{{$message->id}}"></response>		
@endsection