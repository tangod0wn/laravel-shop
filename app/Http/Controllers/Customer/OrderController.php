<?php

namespace theGrocer\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Auth;
use Validator;
use theGrocer\Http\Requests;
use theGrocer\Http\Controllers\Controller;
use theGrocer\Models\Cart;
use theGrocer\Models\Product;
use theGrocer\Models\Category;
use theGrocer\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    

    public function postOrder(Request $request)
    {
    	// $rules = [
    	// 	'address' => 'required'    		
    	// ];

    	// $validator = Validator::make($request->all(), $rules);

    	// if ($validator->fails()) {
    	// 	// return redirect()
    	// 	// 	->route('home')
    	// 	// 	->with('warning', 'The book could not be added to your cart');
    	// 	return "Address is required";
    	// }

    	$user_id = Auth::user()->id;
    	$address = $request->input('address');
        $message = $request->input('message');
    	$products_in_cart = Cart::with('Products')->where('user_id', '=', $user_id)->get();
    	$products_in_cart_total = Cart::with('Products')->where('user_id', '=', $user_id)->sum('total');
        $order_no = "#".$user_id.date("md");
    	
    	if(!$products_in_cart)
    	{
    		return "no product in cart";
    	}  

    	$order = Order::create([
            'order_no' => $order_no,
    		'user_id'  => $user_id,
    		'address'  => $address,
            'message'  => $message,
    		'total'    => $products_in_cart_total
    	]);

    	foreach ($products_in_cart as $product_in_cart) {
        	$order->orderItems()->attach($product_in_cart->product_id,
               [
               		'amount' => $product_in_cart->amount,
               		'price'  => $product_in_cart->Products->price,
               		'total'  => $product_in_cart->Products->price * $product_in_cart->amount
               ]);    		
    	}

    	Cart::where('user_id', '=', $user_id)->delete();

		// return redirect()
		// 	->route('home')
		// 	->with('success', 'You ordered created successfully');

            return back()
                ->with('success', "Your have ordered successfully!");		
    }

    public function Index()
    {  
	    $user_id = Auth::user()->id;

	    $orders = Order::with('orderItems')->where('user_id','=',$user_id)->get();  
    	$categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get(); 
        $total_product = count($products_in_cart = Cart::with('Products')->where('user_id', '=', $user_id)->get());
	    
	    if(!$orders){
	     // return Redirect::route('index')->with('error','There is no order.');      	
	    	return "There is no order!";
	    }

	   return view('customer.order')
	    	->with('categories', $categories)
	     	->with('category_with_parent_id', $category_with_parent_id)	   
	   		->with('orders', $orders)
            ->with('total_product', $total_product);
	}
}