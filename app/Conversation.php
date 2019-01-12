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
    	return $this->hasMany(PrivateMessage::class);
    }
}
