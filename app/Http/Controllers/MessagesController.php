<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function show(Message $message)
    {
    //	$message = Message::find($id);
    	echo $message;
    	return view('messages.show',["message"=>$message]);
    }

    public function create(Request $request)
    {
    	dd($request->all());
    }

}
