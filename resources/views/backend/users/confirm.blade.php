@extends('layouts.backend.main')
@section('title','MyBlog | All Posts')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('blog.index')}}">Users</a></li>
        <li class="active">Confirm Deletion</li>
      </ol>
	</section>
	<section class="content">
        <div class="row">
          {!!Form::model($user, [
                  'method'=>'DELETE',
                  'route' =>['users.destroy',$user->id],
          ])!!}
            <div class="col-xs-12">
              <div class="box">
            	
              <!-- /.box-header -->
                  <div class="box-body ">
                    <div class="">
                      <p>You have specified this user for deletion</p>
                      <p class="text-capitalize">ID#{{$user->id }}{{" "}}{{ $user->name}}</p>
                      <p>The what should we do with the contents belongs to the user?</p>
                      <p><input type="radio" name="deleted" value="delete" checked>Delete all Content</p>
                      <p><input type="radio" name="deleted" value="attribute">Attribute Content to:
                      {!!Form::select('selected_user',$users,null,['class'=>'text-capitalize']);!!}</p>
                      
                      <button type="submit" class="btn btn-danger">Confirm Deletion</button>
                      <a class="btn btn-default" href="{{route('users.index')}}">Cancel</a>
                        {!!Form::close();!!}
                    </div>
                  </div>
              </div>
            </div>
        
      <!-- ./row -->
    </section>
@endsection