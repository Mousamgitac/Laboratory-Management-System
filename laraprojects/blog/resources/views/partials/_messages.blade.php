@if(Session::has('success')==!null)
 <div class = "alert alert-success" role = "alert">
 	<strong>Success:</strong>{{Session :: get('success') }}
 </div>
@endif