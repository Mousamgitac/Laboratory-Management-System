 @extends('main')
 @section('title', '| Blogs')
 @section('content')
  <div class = "row"> 
    <div class = "col-md-12">
     <h1>Blogs!</h1>
    </div>
  </div>
   <hr>
   <div class = "row"> 
    <div class = "col-md-8">
     @foreach($posts as $post)
     <div class="Post"> 
     <h1>{{ $post->title }}</h1>
      <label>Posted At:</label>
          <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
     <p class="lead">{{ substr($post->body,0,200) }}{{ strlen($post->body)>50?'...':'' }}</p>
      <a class="btn btn-primary btn-lg" href="{{ url('blog/'.$post->slug) }}" role="button">Read More</a>
     </div>
     <hr>
     @endforeach
   </div>

 </div>
 <div class = "text-right">
    {{ $posts->links() }}
   </div>
 @endsection