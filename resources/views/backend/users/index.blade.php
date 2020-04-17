@extends('layouts.backend.main')
@section('title','MyBlog | All Posts')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('users.index')}}">Users</a></li>
        <li class="active">Display all Users</li>
      </ol>
	</section>
	<section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            	<div class="box-header clearfix">
               <div style="margin-bottom:20px ;display:block"class="pull-left">
                  <a class="btn btn-success" href="{{route('users.create')}}">Add New</a>
                </div> 
              </div>
              <!-- /.box-header -->
              <div class="box-body ">
              	
              	@if(session('status'))
              	<div class="alert alert-success d-block">
              		<h3 style="" class="text-uppercase font-weight-bold text-center">{{session('status')}}</h3>
              	</div>
                
              	@endif
              	@if($users->count()==0)
              		<div class="alert alert-danger">
              			<h3 style="" class="text-uppercase font-weight-bold">No record found !</h3>
              		</div>
              	@else
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <td width="80">Action</td>
                          <td width="300">Name</td>
                          <td>Bio</td>
                          <td>Email</td>
                          <td>Role </td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <td>
                            {!!Form::model($user, [
                              'method'=>'DELETE',
                              'route' =>['users.destroy',$user->id],
                              
                            ])!!}
                            
                           @if($user->id==1)
                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-xs btn-default disabled"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-xs btn-danger disabled" onclick="return false;"><i class="fa fa-times"></i></button>
                            {!!Form::close()!!}
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->bio}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->roles->first()->display_name}}</td>
                            @else
                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-xs btn-danger" href="{{route('user.confirm',$user->id)}}"><i class="fa fa-times"></i></a>
                            {!!Form::close()!!}
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->bio}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->roles->first()->display_name}}</td>
                          @endif
                         
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                @endif
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
              	<div class="pull-left">
	              	<ul class="pagination no-margin">
	              		{{$users->appends(Request::query())->render()}}
	              	</ul>
              	</div>
              	<div class="pull-right">{{$UserCount}}{{str_plural(' User',$UserCount)}}</div>
              </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
@endsection