@extends('main')

@section('title', "| $post->title")

@section('content')

  <div class="row">
    <div class="col-md-8">
    	<img src="{{ asset('images/' . $post->image) }}" width="800" height = "400" />
      <h1>{{ $post->title }}</h1>
      
      <p class="lead">{{ $post->body }}</p>
      <p class="lead">{{ $post->category->name }}</p>
    </div>
   </div>
@endsection