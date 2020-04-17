<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
	protected $fillable=['title','slug','created_at','updated_at'];
    public function getRouteKeyName() {
        return 'slug';
    }
    public function posts(){
    	return $this->hasMany(Post::class);
    }
    
        
	
}
