@extends('layouts.master')

@section('content')
<div class="row">
	<div >

	@foreach($orders as $order)
		<div class="panel panel-default col-md-8 col-md-offset-2">
		  <div class="panel-body">
			  <ul class="list-group">
			  	@foreach($order->cart->items as $item)
			    <li class="list-group-item">
			    	<span class="badge">P{{ $item['price'] }} </span>
			    	{{ $item['item']['title'] }} | {{ $item['qty']}} order(s)
			    </li>
			    @endforeach
			  </ul>
		  </div>
		  <div class="panel-footer">
		  <strong>Total Price of: P{{$order->cart->totalPrice}}</strong>
		  </div>
		</div>
	</div>
		@endforeach
</div>
@endsection