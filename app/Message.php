<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;//.l.

class Message extends Model
{

    use Searchable; // .l.

    protected $guarded = [];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function getImageAttribute($image)
    {
    	if(!$image || starts_with($image,'http'))
    	{
    		return $image;
    	}
    	
    	return \Storage::disk('public')->url($image);
    }

    public function toSearchableArray()
    {
        $this->load('user');

        return $this->toArray(); 
    }
}
