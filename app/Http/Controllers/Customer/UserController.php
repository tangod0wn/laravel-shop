<?php

namespace theGrocer\Http\Controllers\Customer;

use Illuminate\Http\Request;

use theGrocer\Http\Requests;
use theGrocer\Http\Controllers\Controller;
use theGrocer\Models\Category;
use theGrocer\Models\User;
use Auth;

class UserController extends Controller
{

    public function  getEditProfile($id)
    {
        $customer = User::where('id', $id)->first();

        if (!(Auth::user()->id == $customer->id)) {
            return back()->with('warning', 'you cannot edit another profile!');
        }

        $categories = Category::all();
        $category_with_parent_id = Category::where('parent_id', '>', '0')->get();         
        if (!$customer) {
            return redirect()->route('home');
        } else {
            return view('customer.edit_register_form')
                ->with('categories', $categories)
                ->with('category_with_parent_id', $category_with_parent_id)
                ->with('customer', $customer);
        }
    }

    public function  postEditProfile(Request $request, $id)
    {
        $customer = User::where('id', $id)->first();

        $this->validate($request, User::$rules);  

        $customer->update([
            'first_name'   => $request->input('first_name'),
            'last_name'    => $request->input('last_name'),
            'email'        => $request->input('email'),
            'password'     => bcrypt($request->input('password')),
            'hold_name'    => $request->input('hold_name'),
            'hold_no'      => $request->input('hold_no'),
            'road_no'      => $request->input('road_no'),
            'hold_area'    => $request->input('hold_area'),
            'phone_number' => $request->input('phone_number')
        ]); 

        return redirect()
            ->route('edit.profile', ['id' => $customer->id])
            ->with('success', 'You have successfully updated your profile.');      
    }    


    
}
