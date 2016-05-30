<?php

namespace theGrocer\Http\Controllers\Admin;

use Illuminate\Http\Request;

use theGrocer\Http\Requests;
use theGrocer\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller
{
	public function getLogin()
	{
		return view('admin.login');
	}

    public function postLogin(Request $request)
    {
    	$admin = auth()->guard('admins');

    	$credentials = [
    		'email' => $request->input('email'),
    		'password' => $request->input('password')
    	];
    	
    	if ($admin->attempt($credentials)) {
    		return redirect()->intended('admin');
    	} else {
    		return redirect()->route('admin.login');
    	}
    }

    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }

    public function index()
    {
        return view('admin.welcome');
    }
}
