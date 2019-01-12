<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\PrivateMessage;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function show($username)
    {   
        if($username != 'home'){
        	$user = $this->findByUsername($username);
        	//dd($user);
        	return view('users.show',[
        		'user' => $user,
        	]);
        }
        else
        {
         return view('home');
        }
    }

    public function follows($username)
    {
    	$user = $this->findByUsername($username);
    	//dd($user);
    	return view('users.follows',[
    		'user' => $user,
    		'follows'=>$user->follows
    	]);
    }

    public function follow($username,Request $request)
    {
    	$user = $this->findByUsername($username);
    	
    	$me = $request->user();
    	
    	$me->follows()->attach($user); //agregue

    	return redirect("/$username")->withSuccess("Usuario seguido!");
    }

    private function findByUsername($username){
    	$user = User::where('username',$username)->first();
    	return $user;
    }

    public function unfollow($username,Request $request)
    {
    	$user = $this->findByUsername($username);
    	
    	$me = $request->user();
    	
    	$me->follows()->detach($user); //agregue

    	return redirect("/$username")->withSuccess("Usuario no seguido!");
    }

    public function followers($username)
    {
    	$user = $this->findByUsername($username);

    	return view('users.follows',[
    			'user'=>$user,
    			'follows'=>$user->followers
    			]);

    }

    public function sendPrivateMessage($username, Request $request)
    {    
      //  dd($username);
        $user = $this->findByUsername($username);
        //dd($user);
        $me = $request->user();
        $message = $request->input('message');

        $conversation = Conversation::between($me,$user);

        /*
        $conversation = Conversation::create();
        $conversation->users()->attach($me);
        $conversation->users()->attach($user);
        */
        $privatemessage = PrivateMessage::create([
            'conversation_id'=>$conversation->id,
            'user_id'=>$me->id,
            'message'=>$message,
        ]);

        return redirect('/conversations/'.$conversation->id);

    }

    public function showConversation(Conversation $conversation)
    {   
        $conversation->load('users','privateMessage');
        return view('users.conversation',[
            'conversation'=>$conversation,
            'user'=>auth()->user(),
        ]);
        //dd($conversation);
    }
}
