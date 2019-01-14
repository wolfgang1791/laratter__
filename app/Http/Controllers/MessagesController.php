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
        $usuario = $request->user();
        $imagen = $request->file('image');
    	$message = Message::create([
            'user_id'=>$usuario->id,
            'content'=>$request->input("message"),
            'image'=>$imagen->store('messages','public'),
            //'https://i.pinimg.com/736x/94/0e/83/940e83eb09a954567d99e6314e3f3e72.jpg'
        ]);

        return redirect('/messages/'.$message->id);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $messages = Message::search($query)->get();
        $messages->load('user');
      //  dd($messages);
        return view("messages.index",[
            'messages'=>$messages,
        ]);
    }

    public function responses(Message $message)
    {
        return $message->responses;
    }

}
