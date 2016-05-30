<?php

namespace theGrocer\Http\Controllers\Customer;

use Illuminate\Http\Request;

use theGrocer\Http\Requests;
use theGrocer\Http\Controllers\Controller;

use theGrocer\Models\Category;
use theGrocer\Models\Product;
use theGrocer\Models\Order;
use DB;
class HomeController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();    	
	    	return view('customer.index')
	    	->with('categories', $categories)
	     	->with('category_with_parent_id', $category_with_parent_id);
    	// return $category_with_parent_id;
    }


    public function products($slug)
    {
    	$category =  Category::where('slug', '=', $slug)->first();
    	$categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();    	
	    	return view('customer.category')
	    		->with('categories', $categories)
	    		->with('category_with_parent_id', $category_with_parent_id)
	    		->with('category', $category);
    }

    public function show($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', '=', $id)->get();
        $categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();       
            return view('customer.show')
                ->with('categories', $categories)
                ->with('category_with_parent_id', $category_with_parent_id)
                ->with('category', $category)
                ->with('products', $products);        
    }

    public function test()
    {
        $categories = Category::all();
        $products = Product::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();       
            return view('customer.test2')
                ->with('categories', $categories)
                ->with('category_with_parent_id', $category_with_parent_id)
                ->with('products', $products);
    }

     public function showAllProducts()
    {
        $categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get(); 
        $products = Product::paginate(10);      
            return view('customer.search')
            ->with('categories', $categories)
            ->with('category_with_parent_id', $category_with_parent_id)
            ->with('products', $products);
        // return $category_with_parent_id;
    }

    public function search(Request $request)
    {
           $query = $request->input('query');
           
           if (!$query) {
               return redirect()->route('products.all');
           }

            $results = Product::where("name", 'LIKE', $query)                     
                     ->paginate(20);  
            $categories = Category::all();
            $category_with_parent_id = Category::where('parent_id', '>', '0')->get();                   
        
           if ($results->count()) {
            return view('customer.search')
                ->with('categories', $categories)
                ->with('category_with_parent_id', $category_with_parent_id)
                ->with('products', $results);

           } else {
                return redirect()->route('products.all');
           }
          
    }  


    public function help()
    {
        $categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();       
            return view('customer.faq')
            ->with('categories', $categories)
            ->with('category_with_parent_id', $category_with_parent_id);
    }  

    public function faq()
    {
        $categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();       
            return view('customer.faq')
            ->with('categories', $categories)
            ->with('category_with_parent_id', $category_with_parent_id);
    }  

    public function about_us()
    {
        $categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();       
            return view('customer.about_us')
            ->with('categories', $categories)
            ->with('category_with_parent_id', $category_with_parent_id);
    } 

    public function contact_us()
    {
        $categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();       
            return view('customer.contact')
            ->with('categories', $categories)
            ->with('category_with_parent_id', $category_with_parent_id);
    } 

    public function terms()
    {
        $categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();       
            return view('customer.terms_of_use')
            ->with('categories', $categories)
            ->with('category_with_parent_id', $category_with_parent_id);
    }
    public function privacy()
    {
        $categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();       
            return view('customer.about_us')
            ->with('categories', $categories)
            ->with('category_with_parent_id', $category_with_parent_id);
    }         





}
