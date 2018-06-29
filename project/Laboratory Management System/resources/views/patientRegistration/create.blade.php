 @extends('main')
 @section('title', 'Laboratory Management System | Patient Regitration')
 @section('content')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Registration
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"></a>patient Registration</li>
      <li class="active"></li>
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
            {!! Form::open(array('route'=>'patientRegistration.store','data-parsley-validate' => '','files' => 'true'))!!}
            <div class="col-md-4">
              {{Form::label('fname','First Name:')}}
              {{ Form::text('fname',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}
              {{Form::label('lname','Last Name:')}}
              {{ Form::text('lname',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}
              {{ Form::label('date','Date of Birth:') }}
              <input type='date' name = 'date'  class="form-control" />
              
              {{ Form::label('sex', 'Sex: ') }}<br>
              <input type="radio" name="sex" value="male" class =""> Male 
              <input type="radio" name="sex" value="female"> Female
              <input type="radio" name="sex" value="other"> Other
              </div>
              <div class="col-md-4">
              {{Form::label('address','Address:')}}
              {{ Form::text('address',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}
              {{ Form::label('province', 'State:') }}
              <select class="form-control province" name="province" id= "province_id">
                <option value="0" disable="true" selected="true">=== Select Province ===</option>
                @foreach ($provinces as $province)
                <option value="{{$province->province_id}}">{{ $province->province_name }}</option>
                @endforeach
              </select>
              {{Form::label('districts','District:')}}
              <select class="form-control district" name="districts">
                <option value="0" disable="true" selected="true">=== Select district ===</option>
              </select>
              {{Form::label('localLevel','Local Level:')}}
              <select class="form-control localLevel" name="localLevel">
                <option value="0" disable="true" selected="true">=== Select VDC/MUN ===</option>
              </select>       
            </div>
            <div class="col-sm-4">
              {{Form::label('contactNo','Contact No:')}}
              {{ Form::text('contactNo',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}
              {{Form::label('mobNo','Mobile No:')}}
              {{ Form::text('mobNo',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}
              {{Form::label('email','Email:')}}
              {{ Form::text('email',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}       
            </div>
          </div>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">History</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="col-sm-12">
                    {{ Form::label('featured_image', 'Upload Previous Report:') }}
                    {{ Form::file('featured_image') }}

                    <br>
                    {{Form::label('patientHistory','Patient History:')}}
                    {{ Form::text('patientHistory',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}
                    {{Form::label('diagnosis','Diagnosis:')}}
                    {{ Form::text('diagnosis',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}
                    {{Form::label('previousTest',' Previous Test:')}}
                    {{ Form::text('previousTest',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}
                    {{Form::label('previousHospital',' Previous Hospital:')}}
                    {{ Form::text('previousHospital',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}
                    {{Form::label('doctor',' Doctor:')}}
                    {{ Form::text('doctor',null,array('class'=>'form-control', 'required' => '', 'maxlength' => '255')) }}
                    <input type ="hidden" name = "regDate" value ="{{(\Carbon\Carbon::now()) }}">
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
