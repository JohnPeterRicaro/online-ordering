@extends('layouts.master')

@section('title')

  Franklin Baker Online Ordering
  
@endsection

@section('content')
  @if(Session::has('success'))
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <div id="charge-message" class="alert alert-success">
              {{Session::get('success')}}
        </div>
      </div>
    </div>
  @endif
  @foreach($products->chunk(3) as $productchunks)
<div class="row">
      @foreach($productchunks as $product)
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src="{{$product->imagePath}}" alt="...">
        <div class="caption">
          <h3>{{$product->title}}</h3>
          <p class="description">{{$product->description}}</p>
          <div class="clearfix">
            <div class="pull-left price">P {{$product->price}}/Kg</div>
            <p><a href="{{ route('product.Addtocart', ['id'=>$product->id]) }}" class="btn btn-default pull-right" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Cart</a></p>
          </div>
        </div>
      </div>
    </div>
      @endforeach
</div>
  @endforeach

@endsection