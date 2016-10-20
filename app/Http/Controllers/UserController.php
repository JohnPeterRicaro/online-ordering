<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

use Session;
use App\Http\Requests;
use Auth;

class UserController extends Controller
{
    public function getSignup(){

    	return view('user.signUp');

    }

    public function postSignup(Request $request){

    	$this->validate($request, [
    		
    		'email'=>'email|required|unique:Users',
    		'password'=>'required|Between:3,52|AlphaNum|confirmed',
    		'password_confirmation'=>'required|AlphaNum|Between:3,52',
    		'firstName'=>'required|Alpha',
    		'lastName'=>'required|Alpha',
    		'contact'=>'required|AlphaNum|Between:3 , 25',
            'address'=>'required|AlphaNum|Between:10 , 125'

    	]);

    	$user = new User([

    			'email' => $request->input('email'),
    			'password' => bcrypt($request->input('password')),	
    			'firstName' => $request->input('firstName'),	
    			'lastName' => $request->input('lastName'),	
    			'contact' => $request->input('contact'), 
                'address' => $request->input('address')

    		]);
    	$user->save();

        Auth::login($user);

        if(session::has('oldURL')){
                $oldURL = Session::get('oldURL');
                Session::forget('oldURL');
                return redirect()->to($oldURL);

            }

    	return redirect()->route('user.profile');

    }

    public function getSignIn(){

        return view('user.signIn');

    }

    public function postSignIn(Request $request){
        $this->validate($request,[
            'email'=>'email|required',
            'password'=>'required|Between:3,52'

        ]);
        if(Auth::attempt(['email' => $request->input('email'),'password' =>$request->input('password')])){
            if(session::has('oldURL')){
                $oldURL = Session::get('oldURL');
                Session::forget('oldURL');
                return redirect()->to($oldURL);

            }
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }
    public function getProfile(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile', ['orders'=> $orders]);

    }  
     public function getLogout(Request $request)
    {
     Auth::logout();

     $request->session()->forget('cart');

     return redirect()->route('user.signIn');
    }
}
