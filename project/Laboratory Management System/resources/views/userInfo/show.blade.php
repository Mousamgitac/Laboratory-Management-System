@extends('main')
@section('title', 'Laboratory Management System | Patient Regitration')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User 
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
      <li><a href="#"></a>User Info</li>
      <li class="active"></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class = "well col-md-12">
          <div class="box">
            <div class="box-header with-border bg-primary">
              <h3 class="box-title ">User Details</h3>

              <div class="box-tools pull-right">
                   
                  </div>
                </div>
                <div class="box-body">
            <div class = "col-md-12">
              <b>User Name</b> : {{ $user ->name }} <br><br>
              <b>Contact</b>   : {{ $user->contact }} <br><br>
              <b>Email</b>   :  {{ $user->email }}
            </div>             
          </div>
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
              
                @foreach($user->departments as $department)
                 {{ $department->department_name }} </br>
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
               @foreach($user->labModules as $module)
                 {{ $module->labModule_name }} </br>
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
              @foreach($user->accesslevels as $access)
                 {{ $access->accessLevel_name }} </br> 
              @endforeach  
            </div>             
          </div>
        </div>
      </div>
       </div>
   <!-- /.box -->

 </section>
 <!-- /.content -->
</div>
@endsection 