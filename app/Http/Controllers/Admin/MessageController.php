<?php

namespace theGrocer\Http\Controllers\Admin;

use Illuminate\Http\Request;

use theGrocer\Http\Requests;
use theGrocer\Http\Controllers\Controller;

use theGrocer\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
    	$messages = Message::orderBy('created_at', 'desc')->paginate(10);

    	return view('admin.message.index')
    		->with('messages', $messages);
    }

    public function show($id)
    {
    	$message = Message::find($id);
        if (!$message) {
            abort(404);
        }    	
    	return view('admin.message.show')
    		->with('message', $message);
    }



    public function postEdit(Request $request, $id)
    {
    	$message = Message::find($id);
        if (!$message) {
            abort(404);
        } 

        if ($request->input('name')) {
            $message->update([
                'read' => 1
            ]);

            return redirect()
                ->route('message.index')
                ->with('success', 'Message updated successfully.');       

        } else {
            return redirect()
                ->route('message.index');            
        }

    }        


    public function postDelete(Request $request, $id)
    {
        $message = Message::find($id);
        if ($request->input('delete')) {
            $message->delete();
            return redirect()
                ->route('message.index')
                ->with('success', 'Message deleted successfully.');  
        } else {
            return redirect()
                ->route('message.index');            
        }
             
    
    }  

    public function new_message()
      {
        $messages = Message::where('read', 0)->paginate(10);

        return view('admin.message.index')
            ->with('messages', $messages);
      }  



}
