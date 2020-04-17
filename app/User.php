<?php

namespace App;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','created_at','bio','updated_at','slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany(Post::class,'author_id');
    }
    public function getRouteKeyName() {
        return 'slug';
    }
    public function gravater(){
        $email = $this->email;
        $default = asset('img/author.jpg');
        $size = 40;
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    }
}
