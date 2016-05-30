<?php

namespace theGrocer\Http\Controllers\Admin;

use Illuminate\Http\Request;

use theGrocer\Http\Requests;
use theGrocer\Http\Controllers\Controller;

use theGrocer\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
    	$customers = User::orderBy('created_at', 'desc')->paginate(10);
    	return view('admin.customer.index')
    		->with('customers', $customers);
    }

    public function search(Request $request)
    {
       $query = $request->input('query');
       
       if (!$query) {
           return redirect()->route('customer.index');
       }

        $results = User::where("first_name", 'LIKE', $query)                     
                 ->paginate(5);  
       
       if ($results->count()) {
            return view('admin.customer.index')
                ->with('customers', $results);                    

       } else {
        return redirect()
            ->route('customer.index')
            ->with('warning', 'Sorry We could not find any results for your query!');  
       }
      
    }


}
