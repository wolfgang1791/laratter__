<img class="img-thumbnail" src="{{$message->image}}">
    <p class="card-text">
    	<span class="text-muted">Escrito por el madafaka <a href="/{{$message->user->name}}">{{$message->user->name}}</a></span>
    	<br>
        {{$message->content}}
        <a href="/messages/{{$message->id}}">Leer más</a>
    </p>