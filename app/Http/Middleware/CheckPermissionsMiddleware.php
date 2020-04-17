<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;

class CheckPermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentUser=$request->user();

        $currentActionName=$request->route()->getActionName();
        $links=explode('@',$currentActionName);
        list($controller,$method) = $links;
        $tusher=str_replace(["App\\Http\\Controllers\\Backend\\","Controller" ],"", $controller);

        
        $crudPermissionsMap=[
            'crud'  =>['create','store','update','destroy','forceDestroy','restore','index','view','edit']
        ];
        $classMap=[
            'Blog'  =>'post',
            'Catagories'=>'category',
            'Users'=>'user'
        ];
        
        
        foreach($crudPermissionsMap as $crudPermission=>$methods){
            if(in_array($method,$methods) && isset($classMap[$tusher])){
                
                $className=$classMap[$tusher];
                
                if(! $currentUser->can($crudPermission."-".$className)){
                   abort(403,"forbidden Access!");
                }
            }
        }
        
        return $next($request);
    }
}
