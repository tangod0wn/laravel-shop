<?php

namespace theGrocer\Http\Controllers\Customer;
use Auth;
use Illuminate\Http\Request;
use Validator;
use theGrocer\Http\Requests;
use theGrocer\Http\Controllers\Controller;
use theGrocer\Models\Product;
use theGrocer\Models\Category;
use theGrocer\Models\Cart;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$user_id = Auth::user()->id;
    	$products_in_cart = Cart::with('Products')->where('user_id', '=', $user_id)->get();
    	$products_in_cart_total = Cart::with('Products')->where('user_id', '=', $user_id)->sum('total');

    	if(!$products_in_cart)
    	{
    		return "no product in cart";
    	}

    	$categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();  
    	return view('customer.cart')
	    	->with('categories', $categories)
	     	->with('category_with_parent_id', $category_with_parent_id)    	
    		->with('products_in_cart', $products_in_cart)
    		->with('products_in_cart_total', $products_in_cart_total);

    	 // return $products_in_cart;
    }

    public function postAddToCart(Request $request)
    {
    	$rules = [
    		'product_id' => 'required',
    		'amount'     => 'required'
    	];

    	$validator = Validator::make($request->all(), $rules);

    	if ($validator->fails()) {
    		return redirect()
    			->route('home')
    			->with('warning', 'The book could not be added to your cart');
    	}

    	$user_id = Auth::user()->id;
    	$product_id = $request->input('product_id');
    	$amount =  $request->input('amount');
    	$product = Product::find($product_id);
    	$total = $amount * $product->price;

    	 $count = Cart::where('product_id','=',$product_id)->where('user_id','=',$user_id)->count();

    	 if ($count) {
    		// return redirect()
    		// 	->route('home')
    		// 	->with('warning', 'The book already  added to your cart');    	 	
    		// return "The book alrady added to your cart";
            return back()
                ->with('warning', "The product alrady in your cart!");
    	 }

    	 $cart = new Cart;
    	 $cart->user_id = $user_id;
    	 $cart->product_id = $product_id;
    	 $cart->amount = $amount;
    	 $cart->total = $total;

    	 if ($cart->save()) {
    		return back()    		  
    		  ->with('success', 'The product successfully added to your cart');       	 	
    		
    	 } else {
    	 	return "Ops! something went wrong!";
    	 }

    }

    public function postEdit(Request $request, $id)
    {
        $cart = Cart::find($id);
        $user_id = Auth::user()->id;

        if (!$cart) {
            abort(404);
        }
        if ($cart->user_id != $user_id) {
            return back()->with('warning', 'you cannot edit another profile!');
        }

        $product = Product::find($cart->product_id); 

        $amount = $request->input('amount');
        $total = $amount * $product->price;

        $cart->update([
            'amount' => $amount,
            'total'  => $total
        ]);

        return redirect()->route('cart.index');
       
    }


    public function postDelete($id)
    {
        $cart = Cart::find($id);
        $user_id = Auth::user()->id;

        if (!$cart) {
            abort(404);
        }
        if ($cart->user_id != $user_id) {
            return "You are not allowed to edit other cart!";
        } else {
            $cart->delete();
            return redirect()->route('cart.index'); 

        } 
             
    }    


}
