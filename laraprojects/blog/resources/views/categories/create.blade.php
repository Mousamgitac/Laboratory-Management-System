@extends('main')
 @section('title', '| Create New Category')

 @section('stylesheets')
 {!! Html:: style('css/parsley.css') !!}
 @endsection
 @section('content')
  <div class = "row"> 
    <div class = "col-md-8 col-md-offset-2">
    	<h1> Create New category </h1>
    	<hr>
    	{!! Form::open(array('route'=>'posts.store','data-parsley-validate' => ''))!!}
          {{Form::label('name','Category Name:')}}
          {{ Form::text('name',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}

          {{Form::Submit('Create Category',array('class'=>'btn btn-primary btn-lg btn-block','style'=>'margin-top:20px;'))}}
    	{!! Form::close() !!}
    </div>
  </div>
 @endsection

 @section('scripts')
 
 {!! Html:: script('js/parsley.min.js') !!}

 @endsection