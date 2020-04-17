<?php

namespace App\Http\Controllers\Backend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
class HomeController extends BackendController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function edit(Request $request){
    	$user=$request->user();
    	return view('profile-edit',compact('user'));
    }
    public function update(Requests\UserRequest $request)
    {
    	($request->user());
    	$data=$request->all();
        $slugarray      =explode(" ", $request->user()->name);
        $slug           =implode("-", $slugarray);
        $data['slug']   = $slug; 
        $user=User::findOrFail($request->user()->id);
        
        
        
        $data['password']=bcrypt($data['password']);
        $user->update($data);
        $tusher=$user->detachRole($user->role);
        
        $user->attachRole($request->role);
        
        
        return redirect('/profile-edit')->with('status','The User has been successfully updated !');
    }
}
