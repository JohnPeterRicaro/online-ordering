<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', [
   'uses' => 'ProductController@getIndex',
   'as' => 'product.index'
]);	

Route::get('/add-to-cart/{id}', [
	'uses' => 'ProductController@getAddtocart',
	'as' => 'product.Addtocart'
]);

Route::get('/reduce/{id}', [
	'uses' => 'ProductController@getReduceByOne',
	'as' => 'product.reduceByOne'
]);

Route::get('/remove/{id}', [
	'uses' => 'ProductController@getRemoveItem',
	'as' => 'product.remove'
]);

Route::get('/shopping-cart', [
	'uses' => 'ProductController@getCart',
	'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
	'uses' => 'ProductController@getCheckOut',
	'as' => 'checkout',
	'middleware' => 'auth'
]);

Route::post('/checkout', [
	'uses' => 'ProductController@postCheckOut',
	'as' => 'checkout',
	'middleware' => 'auth'

]);

Route::group(['prefix'=>'user'], function(){

	Route::group(['middleware' => 'guest'], function(){

		Route::get('/signup',[

			'uses' => 'UserController@getSignup',
			'as' => 'user.signUp'


		]);	

		Route::post('/signup',[

			'uses' => 'UserController@postSignup',
			'as' => 'user.signUp'

		]);

		Route::get('/signin',[

			'uses' => 'UserController@getSignIn',
			'as' => 'user.signIn'


		]);

		Route::post('/signin',[

			'uses' => 'UserController@postSignIn',
			'as' => 'user.signIn'

		]);

	});

	

	Route::group(['middleware'=>'auth'], function(){

		Route::get('/profile',[

			'uses' => 'UserController@getProfile',
			'as' => 'user.profile'


		]);

		Route::get('/logout',[

			'uses' => 'UserController@getLogout',
			'as' => 'user.logout'

		]);

	});

});