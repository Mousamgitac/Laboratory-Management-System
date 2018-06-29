@extends('main')
 @section('title', '| View Posts')
 @section('stylesheets')

  {!! Html::style('css/parsley.css') !!}
  {!! Html::style('css/select2.min.css') !!}

@endsection
   @section('content')
   <div class="row">
   	<div class="col-md-8">
     {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
          {{Form::label('title','Title:')}}
          {{ Form::text('title',null,array('class'=>'form-control input')) }}
          
          {{Form::label('slug','Slug:')}}
          {{ Form::text('slug',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255', 'minlength' => '5')) }}

          {{Form::label('category_id','Category:')}}
            <select class = "form-control" name = "category_id">
              @foreach($categories as $category)
              @if($post->category_id === $category->id)
              <option value ='{{ $category->id }} ' selected>  {{ $category->name }}</option>
              @else
              <option value = '{{ $category->id }} ' >  {{ $category->name }}</option>
               @endif
              @endforeach
            </select>
             <br>
          {{ Form::label('tag_id', 'Tags:') }}
          <select class="form-control select2-multi" name="tag_id[]" multiple="multiple">
          @foreach($tags as $tag)
            <option value='{{ $tag->id }}' selected>{{ $tag->name }}</option>
          @endforeach

        </select>

          {{Form::label('body','Post Body:')}}
          {{ Form::textarea('body',null,array('class'=>'form-control')) }}
    </div>
    <div class="col-md-4">
    <div class="card card-block bg-light">
     <dl class = "dl-horizontal">
      <dt>Created At</dt>
      <dd>{{ date('M j,Y h:ia', strtotime($post->created_at)) }}</dd>
     </dl>
 
     <dl class = "dl-horizontal">
      <dt>Updated At</dt>
      <dd>{{ date('M j,Y h:ia', strtotime($post->updated_at)) }}</dd>
     </dl>
     <div class = "row">
     	<div class ="col-sm-5">
          {{Form::Submit('Save Changes',array('class'=>'btn btn-success btn-block'))}}
     	</div>
     	<div class ="col-sm-5">
     	  {!!Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block'))  !!}
     	</div>
     </div>
    </div>
   </div>
   {!! Form::close() !!}
  </div>
 @endsection

 @section('scripts')

  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
  </script>

@endsection