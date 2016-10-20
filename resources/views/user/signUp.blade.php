@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1>Sign Up! <i class="fa fa-user-plus" aria-hidden="true"></i></h1>
				@if(count($errors) > 0)
					<div class="alert alert-danger">
							@foreach($errors->all() as $error)
								<p>{{$error}}</p>
							@endforeach
					</div>
				@endif
		<form action="{{route('user.signUp')}}" method="post">
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="text" name="email" id="email" class="form-control">				
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">				
			</div>
			<div class="form-group">
				<label for="password_confirmation">Password Confirmation</label>
				<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">				
			</div>
			<div class="form-group">
				<label for="firstName">First Name</label>
				<input type="text" name="firstName" id="firstName" class="form-control">				
			</div>
			<div class="form-group">
				<label for="lastName">Last Name</label>
				<input type="text" name="lastName" id="lastName" class="form-control">				
			</div>
			<div class="form-group">
				<label for="contact">Contact</label>
				<input type="text" name="contact" id="contact" class="form-control">				
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" id="address" class="form-control">				
			</div>
			<button type="submit" class="btn btn-default">Sign Up!</button>
			{{ csrf_field() }}
		</form>
	</div>
</div>
@endsection