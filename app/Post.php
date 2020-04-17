<?php

namespace App;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use softDeletes;
	protected $fillable = [
        'title', 'slug', 'excerpt','body','created_at','catagory_id','image','published_at'
    ];
	public function getRouteKeyName() {
        return 'slug';
    }
    public function author(){
    	return $this->belongsTo(User::class);
    }
    public function catagory(){
    	return $this->belongsTo(Catagory::class);
    }
    public function scopePublished($query){
       return $query->where('published_at',1);
        
    }
}
