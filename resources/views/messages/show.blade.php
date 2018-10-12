@extends('layout.app')

@section('content')
	<h1>Message id: {{$message->id}}</h1>
	<h5>{{$message}}</h5>
	<img class="img img-thumbnail" src="{{$message->image}}">
	<p class="card-text">
		{{$message->content}}
	</p>
@endsection