@extends('main')

@section('title', 'Laboratory Management System | Patient Regitration')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      States
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"></a>State Entry</li>
      <li class="active"></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      {!! Form::open(array('route'=>'state.store','data-parsley-validate' => ''))!!}
      <div class="box-header with-border">
        <h3 class="box-title">State</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            
            <div class="col-sm-3">
              {{Form::label('stateName','State Name:')}}
              {{ Form::text('stateName',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}
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