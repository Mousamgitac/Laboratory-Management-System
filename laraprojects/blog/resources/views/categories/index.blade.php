@extends('main')
 @section('title', '| View Posts')
   @section('content')
   <div class="row">
   	<div class="col-md-6">
    <div class="card border-light mb-3 ">
    <div class = "card-header"> All Categories </div>
    <div class="card-body text-primary">
      <p class="card-text"> <br>
    <table class = "table">
      <thead>
        <th>#</th>
        <th>Name</th>
      </thead>
     <tbody>  
      @foreach($categories as $category)
      <tr>
       <td>{{ $category->id }} </td>
       <td>{{ $category->name }} </td>
         <td><a class = "btn btn-primary" href="{{ route('categories.show',$category->id) }}"  > view </a>  <a href="{{ route('categories.edit',$category->id) }}" class = "btn btn-primary"> edit</a></td>
        </tr>
        @endforeach
    </tbody>
   </table></p>
    </div>
  </div>
</div>
    <div class = col-md-6>
    <div class="card border-light mb-3 " style="">
    <div class="card-header">Create New Category</div>
     <div class="card-body text-primary">
      <p class="card-text"> <br>
      {!! Form::open(array('route'=>'categories.store','data-parsley-validate' => ''))!!}
          {{Form::label('name','Category Name:')}}
          {{ Form::text('name',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}

          {{Form::Submit('Create Category',array('class'=>'btn btn-primary btn-lg btn-block','style'=>'margin-top:20px;'))}}
      {!! Form::close() !!}</p>
      </div>
   </div>
 </div>
</div>
</div>        
@endsection