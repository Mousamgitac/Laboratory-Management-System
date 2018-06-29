 @extends('main')
 @section('title', '| Homepage')
 @section('content')
  <div class = "row"> 
    <div class = "col-md-12">
     <div class="jumbotron">
     <h1>Welcome to my Website!</h1>
     <p class="lead">This is my first website. Special thanks for visiting to my site. Please go through my popular post</p>
      <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
     </div>
    </div>
  </div>
   <hr>
   <div class = "row"> 
    <div class = "col-md-8">
     @foreach($posts as $post)
     <div class="Post"> 
     <h1>{{ $post->title }}</h1>
     <p class="lead">{{ substr($post->body,0,200) }}{{ strlen($post->body)>50?'...':'' }}</p>
      <a class="btn btn-primary btn-lg" href="{{ url('blog/'.$post->slug) }}" role="button">Read More</a>
     </div>
     <hr>
     @endforeach
   </div>
  <div class = "col-md-3 col-md-offset-1">
     <h1>Side Bar!</h1>
  </div> 
 </div>
 @endsection
