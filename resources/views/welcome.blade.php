@extends('layout.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Laratter</h1>
    <nav>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
        </ul>
    </nav>
</div>
<div class="row">
    @forelse($messages as $message)
    <div class="col-md-6">
        <img class="img-thumbnail" src="{{$message['image']}}">
        <p class="card-text">
            {{$message['content']}}
            <a href="/messages/{{$message['id']}}">Leer más</a>
        </p>
    </div>
    @empty
    <p>FUCK YOU no hay nada</p>
    @endforelse
</div>
@endsection