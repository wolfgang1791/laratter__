@extends('layouts.app')

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
    <form action="messages/create" method="post" enctype="multipart/form-data">
        <div class="form-group @if($errors->has('message')) has-danger @endif">
            {{ csrf_field() }}
            <input placeholder="Que cha' estas pensando?" type="text" name="message" class="form-controller">
            @if ( $errors->has('message') )
                @foreach($errors->get('message') as $error)
                    <div class="form-control-feedback">{{$error}}</div>
                @endforeach
            @endif
            <input type="file" class="form-control-file" name="image">
        </div>
    </form>
</div>
<div class="row">
    @forelse($messages as $message)
        <div class="col-md-6">
            @include('messages.messages')
        </div>
    @empty
        <p>FUCK YOU no hay nada</p>
    @endforelse

    @if(count($messages))
    <div class="mt-2 mx-auto"><!-- margin top margin izq der -->
        {{$messages->links()}}<!-- 'pagination::bootstrap-4'-->
    </div>
    @endif
</div>
@endsection
