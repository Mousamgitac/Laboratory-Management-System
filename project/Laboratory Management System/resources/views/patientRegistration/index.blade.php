@extends('main')
 @section('title', '| View Posts')
   @section('content')
   <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"></a>patients </li>
      <li class="active"></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
   <div class="row">
   	<div class="col-md-9">
    <a href="/patientRegistration" class = " btn btn-primary"> All patients </a>
    </div>
    <div class="col-md-3">
    <a href="{{ route('patientRegistration.create') }}" class = "btn btn-lg btn-block btn btn-primary"> Register New Patient </a>
    </div>
    <div class="col-md-3 search-container">
    <form action="{{url('search')}}">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    </div>
    <div class="col-md-5 search-container">
      <form action="{{url('searchdate')}}">
      from: <input type="date" placeholder="from.." name="from">
      To: <input type="date" placeholder="to.." name="to" value ="(\Carbon\Carbon::now())" >
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    </div>
   </div> 
    <div class="box-body">
   <div class="row">
   	<div class = "col-md-12">
   	 <table class = "table table-striped table-hover">
   	  <thead>
   	  	<th>Lab Id</th>
   	  	<th>Name</th>
   	  	<th>Age/Sex</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Address</th>
   	  	<th>Registered Date</th>
   	  	<th>Action</th>
   	  </thead>
   	 <tbody> 	
   	 	@foreach($patientRegistrations as $patientRegistration)
   	 	<tr>
   	 	 <td>{{ $patientRegistration->lab_id }} </td>
   	 	 <td>{{ $patientRegistration->fname }} {{ $patientRegistration->lname }} </td>
         <td>{{ \Carbon\Carbon::parse($patientRegistration->date)->diff(\Carbon\Carbon::now())->format('%yy %mm %dd') }} / {{ $patientRegistration->sex}} </td>
         <td>{{  $patientRegistration->contactNo }} </td>
         <td>{{  $patientRegistration->email }} </td>
         <td>{{  $patientRegistration->address }} </td>
         <td>{{  $patientRegistration->regdate }} </td>
        <tr>
        @endforeach
    </tbody>
   </table>
  </div>
 </div>  
  </div>
           <!-- /.box-footer-->
         </div>
         <!-- /.box -->

       </section>
       <!-- /.content -->
     </div>  
@endsection