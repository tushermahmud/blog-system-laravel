<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Catagory;
use App\Post;
class CategoriesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Catagory::with('posts')->orderBy('created_at','desc')->paginate(5);
        
        $categoryCount=Catagory::count();
        return view('backend.category.index',compact('categories','categoryCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagory=new Catagory();
        return view('backend.category.create',compact('catagory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoryRequest $request)
    {
        $data           =$request->all();
        $slugarray      =explode(" ", $request->title);
        $slug           =implode("-", $slugarray); 
        $data['slug']   = $slug;
        Catagory::create($data);
        return redirect('/backend/catagories')->with('status','category has been successfully created !' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $catagory=Catagory::findOrFail($id);
        return view('backend.category.edit',compact('catagory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoryRequest $request, $id)
    {
        $uncategorized=9;
        $category=Catagory::findOrFail($id);
        $user_id=post::where('catagory_id',$id)->update(['catagory_id'=>$uncategorized]);
        $category->update($request->all());
        return redirect('/backend/catagories')->with('status','The category has been successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        $uncategorized=9;
        $catagory=Catagory::findOrFail($id);
        $category_id=post::where('catagory_id',$id)->update(['catagory_id'=>$uncategorized]);
        $catagory->delete();
        
        return redirect('/backend/catagories')->with('status','The category has been successfully deleted !');
    }
}
