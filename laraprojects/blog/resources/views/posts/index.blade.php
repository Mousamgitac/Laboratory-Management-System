@extends('main')
 @section('title', '| View Posts')
   @section('content')
   <div class="row">
   	<div class="col-md-9">
    <h1> All post </h1>
    </div>
    <div class="col-md-3">
    <a href="{{ route('posts.create') }}" class = "btn btn-lg btn-block btn btn-primary"> Create New Post </a>
    </div>
   </div>
   <div class="row">
   	<div class = "col-md-12">
   	 <table class = "table">
   	  <thead>
   	  	<th>#</th>
   	  	<th>Title</th>
   	  	<th>Body</th>
        <th>Category</th>
   	  	<th>Created At</th>
   	  	<th>Action</th>
   	  </thead>
   	 <tbody> 	
   	 	@foreach($posts as $post)
   	 	<tr>
   	 	 <td>{{ $post->id }} </td>
   	 	 <td>{{ $post->title }} </td>
         <td>{{ substr($post->body,0,50) }}{{ strlen($post->body)>50?'...':''}} </td>
        <td>{{ $post->category->name }} </td> 
         <td>{{ date('M j,Y h:ia', strtotime($post->created_at)) }} </td>
         <td><a class = "btn btn-primary" href="{{ route('posts.show',$post->id) }}"  > view </a>  <a href="{{ route('posts.edit',$post->id) }}" class = "btn btn-primary"> edit</a></td>
        <tr>
        @endforeach
    </tbody>
   </table>
    <div class = "text-right">
    {{ $posts->links() }}
   </div>
  </div>
 </div>        
@endsection