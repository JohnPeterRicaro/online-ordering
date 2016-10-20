@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1>Sign In!</h1>
				@if(count($errors) > 0)
					<div class="alert alert-danger">
							@foreach($errors->all() as $error)
								<p>{{$error}}</p>
							@endforeach
					</div>
				@endif
		<form action="{{route('user.signIn')}}" method="post">
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="text" name="email" id="email" class="form-control">				
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">				
			</div>
			<button type="submit" class="btn btn-default">Sign In!</button>
			{{ csrf_field() }}
		</form>
		<p>Don't have an account yet?<a href="{{route('user.signUp')}}"> Sign Up! <i class="fa fa-user-plus" aria-hidden="true"></i></a></p>
	</div>
</div>
@endsection