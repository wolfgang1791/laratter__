<?php

namespace App;

use App\PrivateMessage;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function privateMessage()
    {
    	return $this->hasMany(PrivateMessage::class)->orderby('created_at','desc');
    }

    public static function between(User $me, User $other)
    {
    	$query = Conversation::whereHas('users',function($query) use ($me){
    		 $query->where('user_id',$me->id);
    	})->whereHas('users',function($query) use ($other){
    		 $query->where('user_id',$other->id);
    	});

    	$conversation = $query->firstOrCreate([]);
    	$conversation->users()->sync([
    		$me->id,$other->id
    	]);

    	return $conversation;
    }
}
