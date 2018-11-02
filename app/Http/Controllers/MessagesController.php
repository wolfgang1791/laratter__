<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function show(Message $message)
    {
        //$message = Message::find($id);
    	//echo $message;
    	return view('messages.show',["message"=>$message]);
    }

    public function create(CreateMessageRequest $request)
    {
    	$message = Message::create([
            'content'=>$request->input("message"),
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2hKudmXMJ9_SZTE3pYWfrZrAKoZLQ0MYZ1_lhYrVA8MGXY56g'
        ]);

        return redirect('/messages/'.$message->id);
    }

}
