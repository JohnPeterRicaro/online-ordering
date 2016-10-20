@extends('layouts.master')

@section('title')

  Franklin Baker CheckOut
  
@endsection

@section('content')
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
				<h1>Checkout</h1>
				<h4>Your Total Is: P{{ $total }}</h4>
					<div id="charge-error" class="alert alert-danger 

							{{!Session::has('error') ? 'hidden' : ''}}">

							{{Session::get('error')}}

					</div>
          	  <form action="{{ url('checkout') }}" method="post" id="checkout-form">
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="card-name">Name</label>
								<input type="text" name="name" id="card-name" class="form-control" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="adress">Adress</label>
								<input type="text" name="address" id="address" class="form-control" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="card-name">Card Holder Name</label>
								<input type="text" name="card-name" id="card-name" class="form-control" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="card-number">Credit Card Number</label>
								<input type="text" name="card-number" id="card-number" class="form-control" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<label for="card-expiry-month">Expiration Month</label>
										<input type="text" name="card-expiry-month" id="card-expiry-month" class="form-control" required>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="card-expiry-year">Expiration Year</label>
										<input type="text" name="card-expiry-year" id="card-expiry-year" class="form-control" required>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="card-cvc">CVC</label>
								<input type="text" name="card-cvc" id="card-cvc" class="form-control" required>
							</div>
						</div>
					</div>
					{{ csrf_field() }}
					<button type="submit" class="btn btn-success">Buy NOW!</button>
				</form>
			</div>
		</div>
@endsection

@section('scripts')
	

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/checkout.js"></script>	

@endsection