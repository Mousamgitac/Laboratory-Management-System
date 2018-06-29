@extends('main')
 @section('title', '| View Tags')
   @section('content')
   <div class="row">
   	<div class="col-md-6">
    <div class="card border-light mb-3 ">
    <div class = "card-header"> All Tags </div>
    <div class="card-body text-primary">
      <p class="card-text"> <br>
    <table class = "table">
      <thead>
        <th>#</th>
        <th>Tag Name</th>
      </thead>
     <tbody>  
      @foreach($tags as $tag)
      <tr>
       <td>{{ $tag->id }} </td>
       <td>{{ $tag->name }} </td>
         <td><a class = "btn btn-primary" href="{{ route('tags.show',$tag->id) }}"  > view </a>  <a href="{{ route('tags.edit',$tag->id) }}" class = "btn btn-primary"> edit</a></td>
        </tr>
        @endforeach
    </tbody>
   </table></p>
    </div>
  </div>
</div>
    <div class = col-md-6>
    <div class="card border-light mb-3 " style="">
    <div class="card-header">Create New Tag</div>
     <div class="card-body text-primary">
      <p class="card-text"> <br>
      {!! Form::open(array('route'=>'tags.store','data-parsley-validate' => ''))!!}
          {{Form::label('name','Tag Name:')}}
          {{ Form::text('name',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}

          {{Form::Submit('Create Tag',array('class'=>'btn btn-primary btn-lg btn-block','style'=>'margin-top:20px;'))}}
      {!! Form::close() !!}</p>
      </div>
   </div>
 </div>
</div>
</div>        
@endsection