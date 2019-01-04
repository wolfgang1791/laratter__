<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function show($username)
    {
    	$user = $this->findByUsername($username);
    	//dd($user);
    	return view('users.show',[
    		'user' => $user,
    	]);
    }

    public function follows($username)
    {
    	$user = $this->findByUsername($username);
    	//dd($user);
    	return view('users.follows',[
    		'user' => $user,
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
}
