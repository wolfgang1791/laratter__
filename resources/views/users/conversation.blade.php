@extends('layouts.app')

@section('content')
	<h1>Conversacion con {{$conversation->users->except($user->id)->implode('name',', ')}}</h1><!--implode (a string)-->
	
	
		@foreach($conversation->privateMessage as $message)
			<div class="card">
				<div class="card-header">
					{{$message->user->name}} dijo... 
				</div>	
				<div class="card-block">
					{{$message->message}}
				</div>	
				<div class="card-footer">
					{{$message->created_at}}</p>
				</div>
				
			</div>
		@endforeach
	

@endsection