<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Catagory;
use App\User;

class BlogController extends Controller
{
    //
    public function index(){
    	$posts=Post::with('author','catagory')->published()->orderBy('created_at','desc')->simplePaginate(3);

    	return view('blog.index',compact('posts'));
    }
    public function single(Post $post){
    	$posts=Post::where('slug',$post->slug)->first();
    	return view('blog.show',compact('posts'));
    }
    public function category(Catagory $catagory){
    	$categoryName=$catagory->title;
    	$posts=$catagory->posts()->with('author')->published()->simplePaginate(3);
    	return view('blog.index',compact('posts','categoryName'));
    }
    public function author(User $author){
    	$authorName=$author->name;
    	$posts=$author->posts()->simplePaginate(3);
    	return view('blog.index',compact('posts','authorName'));
    }
    
}
