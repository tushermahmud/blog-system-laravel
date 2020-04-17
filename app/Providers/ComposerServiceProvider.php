<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Catagory;
use App\Post;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar',function($view){
            $catagories=Catagory::with(['posts'=>function($query){
                $query->published();
            }])->orderBy('title','asc')->get();
            return $view->with('catagories',$catagories);
        });
        view()->composer('layouts.sidebar',function($view){
            $popularPosts=Post::get()->sortByDesc('view_count')->take(3);
            return $view->with('popularPosts',$popularPosts);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
