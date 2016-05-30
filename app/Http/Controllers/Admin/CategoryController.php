<?php

namespace theGrocer\Http\Controllers\Admin;
use Auth;
use DB;
use theGrocer\Models\Category;
use Illuminate\Http\Request;

use theGrocer\Http\Requests;
use theGrocer\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function Index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        $parent_categories = Category::all();
    	return view('admin.category.index')
            ->with('categories', $categories)
            ->with('parent_categories', $parent_categories);
    }

    public function postCreate(Request $request)
    {
    	$rules = [
    		'name' => 'required|min:2,max:40|unique:categories'    
    	];

        if ($request->input('parent_id')) {
            $rules = array_add($rules, 'category_pic', 'required');
        }
        

    	$this->validate($request, $rules);

        if ($request->hasFile('category_pic')) {
            $file = $request->file('category_pic');
            $file_name = $file->getClientOriginalName();
            $file_uploaded = $file->move('upload/category', $file_name);
            if (!$file_uploaded) {
                return redirect()
                    ->route('category.index')
                    ->with('warning', 'Category picture can not be uploaded.');                 
            }
        } 
        $slug = $request->input('slug') ? str_slug($request->input('slug')) : str_slug($request->input('name'));

        $category = new Category();            
        $category->name = $request->input('name');
        $category->slug = $slug;
        $category->parent_id = $request->input('parent_id'); 
        $category->description = $request->input('description');
        $category->admin_id= auth()->guard('admins')->user()->id;
        if ($request->hasFile('category_pic')) {
            $category->category_pic = $request->file('category_pic')
                                        ->getClientOriginalName();
        }
        if ($category->save()) {
            return redirect()
                ->route('category.index')
                ->with('success', 'Category created successfully.');                
        } else {
            return redirect()
                ->route('category.index')
                ->with('success', 'Category Not created.');              
        }   

    }

    

    public function getEdit($id)
    {
        $category = Category::where('id', $id)->first();
        $categories = Category::paginate(5);
        $parent_categories = Category::all();

        if (!$category) {
            abort(404);
        }

        if ($category) {
            return view('admin.category.edit')
                ->with('category', $category)
                ->with('categories', $categories)
                ->with('parent_categories', $parent_categories);
        } 
             
    }

    public function postEdit(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();


        if (!( auth()->guard('admins')->user()->id == $category->admin_id) ) {
            return redirect()
                ->route('category.edit', ['id' => $id])
                ->with('warning', 'Sorry! You cannot edit this category. This category is not created by you.');            
        } else {

            $rules = [
                'name' => 'required|min:2,max:40'
            ];

            if ($request->input('parent_id')) {
                $rules = array_add($rules, 'category_pic', 'required');
            }


            // $this->validate($request, $rules);

            $name = $request->input('name') ? $request->input('name') : $category->name;
            $slug = $request->input('slug') ? str_slug($request->input('slug')) : str_slug($request->input('name'));
            
            if ($request->hasFile('category_pic')) {
                $file = $request->file('category_pic');
                $file_name = $file->getClientOriginalName();
                $file_uploaded = $file->move('upload/category', $file_name);
                if (!$file_uploaded) {
                    return redirect()
                        ->route('category.edit', ['id' => $category->id])
                        ->with('warning', 'Category picture can not be uploaded.');                 
                }
            }                        

            $category->update([
                'name'        => $name,
                'slug'        => str_slug($name),
                'parent_id'   => $request->input('parent_id'),
                // 'category_pic'=> $request->file('category_pic')->getClientOriginalName(),
                'description' => $request->input('description')
            ]);

            return redirect()
                ->route('category.index')
                ->with('success', 'Category updated successfully.');  

        }                  

    }

    public function getDelete($id)
    {
        $category = Category::where('id', $id)->first();
        $categories = Category::paginate(5);

        if (!$category) {
            abort(404);
        }

        if ($category) {
            return view('admin.category.delete')
                ->with('category', $category)
                ->with('categories', $categories);
        } 
             
    }

    public function postDelete($id)
    {
        $category = Category::where('id', $id)->first();
        $categories = Category::all();

        if (!$category) {
            abort(404);
        }

        if (!( auth()->guard('admins')->user()->id == $category->admin_id) ) {
            return redirect()
                ->route('category.edit', ['id' => $id])
                ->with('warning', 'Sorry! You cannot delete this category.');            
        } else {

            $category->delete();

            return redirect()
                ->route('category.index')
                ->with('success', 'Category deleted successfully.');  

        } 
             
    }    



    public function search(Request $request)
    {
           $query = $request->input('query');
           
           if (!$query) {
               return redirect()->route('category.index');
           }

            $results = Category::where("name", 'LIKE', $query)                     
                     ->paginate(1);  
            $parent_categories = Category::all();                   
        
           if ($results->count()) {
                return view('admin.category.index')
                    ->with('categories', $results)
                    ->with('parent_categories', $parent_categories);

           } else {
            return redirect()
                ->route('category.index')
                ->with('warning', 'Sorry We could not find any results for your query!');  
           }
          
    }   





}
