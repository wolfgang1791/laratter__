<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
    	$links = array(
		'https://www.google.com.pe'=>'Google',
		'https://www.xvideos.com' =>'XVIDEOS'
		);
    
    	return view('welcome',['links'=>$links]);
    
    }

    public function about()
    {
    	return view('about');
    }
}
