@extends('layouts.app')

@section('content')
	<a class="btn btn-link" href="/{{$user->username}}/follows">Sigue a <span class="badge badge-default">{{ $user->follows->count() }}</span></a>
	<a class="btn btn-link" href="/{{$user->username}}/followers">Seguidores <span class="badge badge-default">{{ $user->followers->count() }}</a>
	<div class="row">
		<img class="img-thumbnail" src="{{$user->avatar}}">
	</div>
	<div class="row">
		<h1>{{$user->name}}</h1> 
	</div>	
		
	@if(Auth::check())
		@if(Gate::allows('dms',$user))
			<form action="/{{$user->username}}/dms" method="post">
				{{ csrf_field()}}
				<input type="text" name="message"	class="form-control">
				<button type="submit" class="btn btn-success">Enviar DM</button>
			</form>
		@endif
		@if(Auth::user()->isFollowing($user))
			<form action="/{{ $user->username}}/unfollow" method="post">
			{{ csrf_field()}}
			@if(session("success"))
				<span class="text-success">{{ session("success")}}</span>
			@endif
			<button class="btn btn-danger">UnFollow</button>
		</form>
		@else
			<form action="/{{ $user->username}}/follow" method="post">
				{{ csrf_field()}}
				@if(session("success"))
					<span class="text-success">{{ session("success")}}</span>
				@endif
				<button class="btn btn-primary">Follow</button>
			</form>
		@endif
	@endif
	<div class="row">
	@foreach($user->messages as $message)
		<div class="col-md-6">
			@include("messages.messages")
		</div>
	@endforeach
	</div>
@endsection