@extends('main')

@section('title', '| View Post')

@section('content')

  <div class="row">
    <div class="col-md-8">
      <h1>{{ $post->title }}</h1>
      
      <p class="lead">{{ $post->body }}</p>

      <hr>
      <div class="tags">
        @foreach ($post->tags as $tag)
          <button class="btn btn-default">{{ $tag->name }}</button>
        @endforeach
      </div>

    </div>

    <div class="col-md-4">
      <div class="card bg-light border-light mb-3 " style="">
        <dl class="dl-horizontal">
          <label>Url:</label>
          <p><a href="{{ url('blog/'.$post->slug)}}">{{  url('blog/'.$post->slug) }}</p>
        </dl>
        <hr>
        <dl class="dl-horizontal">
          <label>Category:</label>
          <p class = "lead"> {{ $post->category->name }} </p>
        </dl>
        <hr>
        <dl class="dl-horizontal">
          <label>Created At:</label>
          <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
        </dl>
        <hr>
        <dl class="dl-horizontal">
          <label>Last Updated:</label>
          <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
          </div>
        </div>
          <hr>
        <div class="row">
          <div class="col-md-12">
            {{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-info btn-block btn-h1-spacing']) }}
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection