<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Catagory;
use App\Post;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogController extends BackendController
{
    protected $uploadPath;
    public function __construct(){
        $this->uploadPath=public_path('img');
        $this->middleware('check-permissions');
    }
    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $onlyTrashed=null;
        if($request->get('status')&&$request->get('status')=='trash'){
            $posts=Post::onlyTrashed()->orderBy('created_at','desc')->paginate(5);
            $onlyTrashed=True;
            $postCount=Post::onlyTrashed()->count();
        }
        elseif($request->get('status')&&$request->get('status')=='published'){
            $posts=Post::published()->orderBy('created_at','desc')->paginate(5);
            $postCount=Post::published()->count();
        }
        elseif($request->get('status')&&$request->get('status')=='draft'){
            $posts=Post::where('published_at',0)->orderBy('created_at','desc')->paginate(5);
            $postCount=Post::where('published_at',0)->count();
        }
        elseif($request->get('status')&&$request->get('status')=='own'){
            $posts=Post::where(['author_id'=>auth()->user()->id])->orderBy('created_at','desc')->paginate(5);
            $postCount=Post::where(['author_id'=>auth()->user()->id])->count();
        }
        else{
           $posts=Post::orderBy('created_at','desc')->paginate(5);
           $onlyTrashed=False; 
           $postCount=Post::count();
        }
        $counts=[
            'own'       =>auth()->user()->posts()->count(),
            'all'       =>Post::count(),
            'trashed'   =>Post::onlyTrashed()->count(),
            'published' =>Post::published()->count(),
            'draft'     =>Post::where('published_at',0)->count()
        ];
        return view('backend.blog.index',compact('posts','onlyTrashed','postCount','counts')); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('backend.blog.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {   /*echo '<pre>';
        print_r($request->title);
        echo'<pre>';
        die();*/
        
        $data           =$this->handleRequest($request);
        $slugarray      =explode(" ", $request->title);
        $slug           =implode("-", $slugarray); 
        $data['slug']   = $slug;
        if($request->submitbutton){
            $data['published_at']=1;
        }
        elseif($request->submitdraftbutton){
            $data['published_at']=0;
        }
        
        $request->user()->posts()->create($data);
        return redirect('backend/blog')->with('status','The post has been successfully added !');
    }
    private function handleRequest($request){
        $data=$request->all();
        if( $request->hasFile('image')){

            $image              =$request->file('image');
            $filename           =$image->getClientOriginalName();
            $uploadPath         =public_path('images');
            $destinationPath    =$uploadPath;
            $successUploaded=$image->move($destinationPath, $filename);
            if($successUploaded){
                 $extention          =$image->getClientOriginalExtension();
                 $thumbnail          =str_replace(".{$extention}","_thumb.{$extention}",$filename);
                $image = Image::make($destinationPath.'/'.$filename)->resize(250, 170)->save($destinationPath.'/'.$thumbnail);
            }
            $data['image']=$filename;
       /* echo '<pre>';
        print_r($request->file('image')->getClientOriginalName());
        echo'<pre>';
        die();*/
        }
        return $data;
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
        $post=Post::findOrFail($id);
       return view('backend.blog.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostRequest $request, $id)
    {
        $post=Post::findOrFail($id);
        $oldImage=$post->image;
        if($oldImage!=$post->image);
        $this->removeImage($oldImage);
        $data=$this->handleRequest($request);
        $slugarray      =explode(" ", $request->title);
        $slug           =implode("-", $slugarray); 
        $data['slug']   = $slug;
        $post->update($data);
        return redirect('backend/blog')->with('status','The post has been successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post=Post::findOrFail($id);
       $post->delete();
       return redirect('backend/blog')->with('trash',['The post has been successfully deleted !',$id]);
    }
    public function restore($id){
        $post=Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back()->with('status', 'The post has been restroed!');
    }
    public function forceDestroy($id){
        $post=Post::withTrashed()->findOrFail($id);
        $post->forceDelete();
        $this->removeImage($post->image);
        return redirect('backend/blog?status=trash')->with('status', 'The post has been permanantly deleted!');
    }
    private function removeImage($image){
        $uploadPath         =public_path('img');
        $destinationPath    =$uploadPath;
        $imagePath     =$uploadPath .'/'.$image;
        $extention     =substr(strrchr($image,'.'),1);
        $thumbnail     =str_replace(".{$extention}","_thumb.{$extention}",$image);
        $thumbnailPath =$uploadPath .'/'.$thumbnail;
        
        if($imagePath && file_exists(public_path('img').'/'.$image)) unlink($imagePath);
        if($thumbnailPath && file_exists(public_path('img').'/'.$image))unlink($thumbnailPath);

    }
}
