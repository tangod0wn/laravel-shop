<?php

namespace theGrocer\Http\Controllers\Admin;

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
    


    public function Index()
    {  

	    $orders = Order::orderBy('created_at', 'desc')->paginate(10);  
	      
	    
	    if(!$orders){
	     // return Redirect::route('index')->with('error','There is no order.');      	
	    	return "There is no order!";
	    }

	   return view('admin.order.index') 
	   		->with('orders', $orders);
	}


	public function show($id)
	{
		$order = Order::find($id);

		return view('admin.order.show')
			->with('order', $order);
		
	}

	public function search(Request $request)
    {
       $query = $request->input('query');
       
       if (!$query) {
           return redirect()->route('order.index');
       }

        $results = Order::where("order_no", 'LIKE', $query)                     
                 ->paginate(5);  
          
       
       if ($results->count()) {
	   return view('admin.order.index')
                ->with('orders', $results);                    

       } else {
        return redirect()
            ->route('order.index')
            ->with('warning', 'Sorry We could not find any results for your query!');  
       }
      
    }

}