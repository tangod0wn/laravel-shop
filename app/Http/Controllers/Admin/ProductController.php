<?php

namespace theGrocer\Http\Controllers\Admin;

use Auth;
use DB;
use theGrocer\Models\Product;
use theGrocer\Models\Category;
use Illuminate\Http\Request;

use theGrocer\Http\Requests;
use theGrocer\Http\Controllers\Controller;

class ProductController extends Controller
{

	
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.product.index')
            ->with('products', $products);            
    }

    public function getCreate()
    {
    	$categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();
    	return view('admin.product.new')
    		->with('categories', $categories)
            ->with('category_with_parent_id', $category_with_parent_id);
    }

    public function postCreate(Request $request)
    {
    $rules = [
        
        'price'     => 'required|numeric',
        'variant'   => 'required',
        'unit'   => 'required',
        'category_id' => 'required',
        
    ];
    	$this->validate($request, $rules);    	

        if ($request->hasFile('product_pic')) {
            $file = $request->file('product_pic');
            $file_name = $file->getClientOriginalName();
            $file_uploaded = $file->move('upload/product', $file_name);
            
            if ($file_uploaded) {
		        $product = new Product();            
		        $product->name =ucfirst( $request->input('name'));
		        $product->price = str_slug($request->input('price'));
		        $product->variant = $request->input('variant');
                $product->unit = $request->input('unit'); 
		        $product->stock = $request->input('stock');
		        $product->description = $request->input('description');
		        $product->product_pic =  $file_name;
		        $product->category_id = $request->input('category_id');
		        $product->admin_id= auth()->guard('admins')->user()->id;


		        if ($product->save()) {
		            return redirect()
		                ->route('product.index')
		                ->with('success', 'Category created successfully.');                
		        } else {
		            return redirect()
		                ->route('product.index')
		                ->with('warning', 'Category Not created.');              
		        }          

            } else {

                return redirect()
                    ->route('product.new')
                    ->with('success', 'Product picture can not uploaded.');                 
            }         

        } else {
            return redirect()
                ->route('product.new')
                ->with('success', 'Please upload a proper file.');                      
        }


    }


    public function getEdit($id)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();

        if (!$product) {
            abort(404);
        }

        if ($product) {
            return view('admin.product.edit')
                ->with('product', $product)
                ->with('categories', $categories)
                ->with('category_with_parent_id', $category_with_parent_id);
        } 
             
    }

    public function postEdit(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        if (!$product) {
            abort(404);
        }  


        if (!(auth()->guard('admins')->user()->id == $product->admin_id) ) {
            return redirect()
                ->route('product.edit', ['id' => $id])
                ->with('warning', 'Sorry! You cannot edit this product. This product is not created by you.');            
        } else {

            $this->validate($request, Product::$rules);            

            if ($request->hasFile('product_pic')) {                
                $file = $request->file('product_pic');
                $file_name = $file->getClientOriginalName();
                $file_uploaded = $file->move('upload', $file_name);

                if ($file_uploaded) {
                    $product->update([
                        'name'        => $request->input('name'),
                        'price'       => $request->input('price'),
                        'variant'     => $request->input('variant'),
                        'unit'     => $request->input('unit'),
                        'stock'       => $request->input('stock'),
                        'description' => $request->input('description'),
                        'product_pic' => $file_name,
                        'category_id' => $request->input('category_id')
                    ]);

                    return redirect()
                        ->route('product.index')
                        ->with('success', 'Product Updated successfully.');  
                } else {
                    return redirect()
                        ->route('product.edit', ['id' => $id])
                        ->with('success', 'Product picture can not be uploaded.');                 
                }         
            } else {
                return redirect()
                    ->route('product.edit', ['id' => $id])
                    ->with('success', 'Please upload a proper file.');                      
            }

        } 

    }   

    public function getDelete($id)
    {
        $product = Product::where('id', $id)->first();
       
        if (!$product) {
            abort(404);
        }

        if ($product) {
            return view('admin.product.delete')
                ->with('product', $product);
        } 
             
    }   

    public function postDelete($id)
    {
        $product = Product::where('id', $id)->first();
        
        if (!$product) {
            abort(404);
        }

        if (!(auth()->guard('admins')->user()->id == $product->admin_id) ) {
            return redirect()
                ->route('product.edit', ['id' => $id])
                ->with('warning', 'Sorry! You cannot delete this product.');            
        } else {

            $product->delete();

            return redirect()
                ->route('product.index')
                ->with('success', 'Product deleted successfully.');  

        } 
             
    }       


    public function search(Request $request)
    {
           $query = $request->input('query');
           
           if (!$query) {
               return redirect()->route('product.index');
           }

            $results = Product::where("name", 'LIKE', $query)                     
                     ->paginate(10);  
                               
        
           if ($results->count()) {
                return view('admin.product.index')
                    ->with('products', $results);                    
           } else{
            return redirect()
                ->route('product.index')
                ->with('warning', 'Sorry We could not find any results for your query!');  
           }
          
    }              
      

 


}
