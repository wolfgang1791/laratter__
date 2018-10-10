@extends('layout.app')

@section('content')
<div class="title m-b-md">
    Laratter
</div>

@if(isset($teacher))
<p>Profesor: {{$teacher}}</p>
@else
<p>Profesor: UNDEFINED</p>
@endif
<div class="links">
  @foreach($links as $link => $value)  
    <a href="{{ $link }}">{{$value}}</a>
  @endforeach
</div>
@endsection