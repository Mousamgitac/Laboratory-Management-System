 @extends('main')
 @section('title', 'Laboratory Management System | User Info')
 @section('stylesheets')
  {!! Html::style('css/parsley.css') !!}
  {!! Html::style('css/select2.min.css') !!}
 @endsection
 @section('content')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User Information
      <small>It all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"></a>Setup</li>
      <li class="active">User Information </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Information</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            {!! Form::open(array('route'=>'userInfo.store','data-parsley-validate' => '','files' => 'true'))!!}
            <div class="col-md-6">
              {{Form::label('fullname','Full Name:')}}
              {{ Form::text('fullname',null,array('class'=>'form-control', 'maxlength' => '255')) }}
              {{Form::label('uname','User Name:')}}
              {{ Form::text('uname',null,array('class'=>'form-control', 'maxlength' => '255')) }}
              {{Form::label('pword','Password:')}}
              {{ Form::password('pword',array('class'=>'form-control', 'maxlength' => '255')) }}
              {{ Form::label('retype','Retype Password:') }}
              <input type='password' name = 'retype'  class="form-control" />
            </div>
            <div class="col-md-6">
              {{Form::label('contact','Contact No:')}}
              {{ Form::text('contact',null,array('class'=>'form-control', 'maxlength' => '255','required'=>'')) }}
              {{Form::label('phone','phone No.:')}}
              {{ Form::text('phone',null,array('class'=>'form-control', 'maxlength' => '255')) }}
              {{Form::label('email','Email:')}}
              {{ Form::email('email',null,array('class'=>'form-control', 'maxlength' => '255','reqired'=>'')) }}
            </div>
          </div>
          <div class = "well col-md-4">
          <div class="box">
            <div class="box-header with-border bg-warning">
              <h3 class="box-title ">Department</h3>

              <div class="box-tools pull-right">
                   
                  </div>
                </div>
                <div class="box-body">
            <div class = "col-md-12">
              
                @foreach($departments as $department)
                <div class="checkbox">
              <label><input type="checkbox"  name = "department[]" value="{{ $department->id }}"> {{ $department->department_name }} </label>
               </div>
              @endforeach
             
            </div>             
          </div>
        </div>
      </div>
      <div class = "well col-md-4">
          <div class="box">
            <div class="box-header with-border bg-success">
              <h3 class="box-title ">Module</h3>

              <div class="box-tools pull-right">
                   
                  </div>
                </div>
                <div class="box-body">
            <div class = "col-md-12">
              
                @foreach($modules as $module)
                <div class="checkbox">
              <label><input type="checkbox" name="labModule[]" value="{{ $module->id }}"> {{ $module->labModule_name }} </label>
               </div>
              @endforeach
             
            </div>             
          </div>
        </div>
      </div>
      <div class = "well col-md-4">
          <div class="box">
            <div class="box-header with-border bg-info">
              <h3 class="box-title">Access Level</h3>

              <div class="box-tools pull-right">
                   
                  </div>
                </div>
                <div class="box-body">
            <div class = "col-md-12">
              
                @foreach($accesses as $access)
                <div class="checkbox">
              <label><input type="checkbox" name = "access[]" value="{{ $access->id }}"> {{ $access->accessLevel_name }} </label>
               </div>
              @endforeach
             
            </div>             
          </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class= "box-footer">
         {{Form::Submit('Add',array('class'=>'btn btn-primary btn-lg btn-block','style'=>'margin-top:20px;'))}}
       {!! Form::close() !!}</p>
     </div>
     <!-- /.box-footer-->
   </div>
   <!-- /.box -->

 </section>
 <!-- /.content -->
</div>
@endsection 
@section('scripts')

{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
  $('.select2-multi').select2();
</script>

@endsection
