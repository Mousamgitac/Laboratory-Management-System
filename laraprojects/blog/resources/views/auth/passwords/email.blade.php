@extends('main')

@section('title', '| Forgot my Password')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="card">
				<div class="card-heading bg-light" style="padding-left: 40%">Reset Password</div>
                 <hr>
				<div class="card-body">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
					
					{!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}

					{{ Form::label('email', 'Email Address:') }}
					{{ Form::email('email', null, ['class' => 'form-control']) }}

					<br>

					{{ Form::submit('Reset Password', ['class' => 'btn btn-primary']) }}

					{{ Form::close() }}

				</div>
			</div>
		</div>
	</div>

@endsection