<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;

use Illuminate\Http\Request;

use App\Order;
use App\Http\Requests;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{
    public function getIndex(){
    	$products = Product::all();
    	return view('shop.index', ['products' => $products]);

    }
    public function getAddtocart(Request $request, $id){

    	$product = Product::find($id); 
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart',$cart);
    	return redirect()->route('product.index');

    }
    public function getReduceByOne($id){

    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->reduceByOne($id);

    	Session::put('cart', $cart);

    	return redirect()->route('product.shoppingCart');

    }

    public function getRemoveItem($id){

    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);

    	$cart->removeItem($id);

    	if(count($cart->items)>0){

    	Session::put('cart', $cart);

    	}else{

    		Session::forget('cart');

    	}

    	return redirect()->route('product.shoppingCart');


    }

    public function getCart(){
    	if(!Session::has('cart')){
    		return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }

    public function getCheckOut(){

    	if(!Session::has('cart')){
    		return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
    	return view('shop.checkout',['total' => $total]);

    }
    public function postCheckOut(Request $request){
		if(!Session::has('cart')){
			return redirect('shopping-cart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		Stripe::setApiKey('sk_test_3R7QDZipsvX9CsAf2DxGD0Ui');
        try {
            $charge =Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));
			$order = new Order();
			$order->cart = serialize($cart);
			$order->address = $request->address;
			$order->name = $request->name;
			$order->payment_id = $charge->id;
			
			Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect('/')->with('success', 'Successfully purchased products!');
	}

}
