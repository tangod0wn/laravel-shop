<?php

namespace theGrocer\Http\Controllers\Customer;

use Illuminate\Http\Request;

use theGrocer\Http\Requests;
use theGrocer\Http\Controllers\Controller;

use theGrocer\Models\Message;

class MessageController extends Controller
{
    public function postMessage(Request $request)
    {
    	$name         = $request->input('name');
    	$email        = $request->input('email');
    	$phone_number = $request->input('phone_number');
    	$body         = $request->input('body');

    	$rules = [
    		'name' 		   => 'required|min:2,max:16',
    		'email'        => 'required|email',
    		'phone_number' => 'required',
    		'body'         => 'required|min:10,max:500',
    	];

    	$this->validate($request, $rules);

    	$message = new Message();

    	$message->name = $name;
    	$message->email = $email;
    	$message->phone_number = $phone_number;
    	$message->body = $body;
        $message->read = 0;

    	if ($message->save()) {
    		return redirect()->route('contact_us');
    	} else {
    		return redirect()->route('contact_us');
    	}




    }
}
