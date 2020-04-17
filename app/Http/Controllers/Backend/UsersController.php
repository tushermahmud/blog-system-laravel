<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
class UsersController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('name','asc')->paginate(5);
        $UserCount=User::count();
        return view('backend.users.index',compact('users','UserCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=new User();
        $user->id=8;
        return view('backend.users.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserRequest $request)
    {

        $data           =$request->all();
        $slugarray      =explode(" ", $request->name);
        $slug           =implode("-", $slugarray); 
        $data['slug']   = $slug;
        $data['password']=bcrypt($data['password']);
        $user=User::create($data);
        $user->attachRole($request->role);

        return redirect('/backend/users')->with('status','User has been successfully created !' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $user=User::findOrFail($id);
        return view('backend.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserRequest $request, $id)
    {
        $data=$request->all();
        $slugarray      =explode(" ", $request->name);
        $slug           =implode("-", $slugarray); 
        $data['slug']   = $slug;
        $user=User::findOrFail($id);
        
        $data['password']=bcrypt($data['password']);
        $tusher=$user->detachRole($user->role);
        
        $user->attachRole($request->role);
        $user->update($data);
        
        return redirect('/backend/users')->with('status','The User has been successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDestroyRequest $request, $id)
    {   
        $user=User::findOrFail($id);
        $userDelete=$request->deleted;
        $selectDelete=$request->selected_user;
        if($userDelete=='delete'){
            $user->posts()->withTrashed()->forceDelete();
        }
        elseif($userDelete=='attribute'){
            $user->posts()->update(['author_id'=>$selectDelete]);
        }
        $user->delete();
        
        return redirect('/backend/users')->with('status','The User has been successfully deleted !');
    }
    public function confirm($id)
    {    
        
        $user=User::findOrFail($id);
        $users=User::Where('id','!=',$id)->pluck('name','id');
        return view('backend.users.confirm',compact('user','users'));
    }
   
}
