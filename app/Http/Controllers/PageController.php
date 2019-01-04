<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
    	$messages = Message::latest()->paginate(10);
    	//dd($messages[1]);
    	return view('welcome',['messages'=>$messages]);
    
    }
}
