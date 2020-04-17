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
        <li><a href="{{route('catagories.index')}}">Categories</a></li>
        <li class="active">Display all Categories</li>
      </ol>
	</section>
	<section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            	<div class="box-header clearfix">
               <div style="margin-bottom:20px ;display:block"class="pull-left">
                  <a class="btn btn-success" href="{{route('catagories.create')}}">Add New</a>
                </div> 
              </div>
              <!-- /.box-header -->
              <div class="box-body ">
              	
              	@if(session('status'))
              	<div class="alert alert-success d-block">
              		<h3 style="" class="text-uppercase font-weight-bold text-center">{{session('status')}}</h3>
              	</div>
                
              	@endif
              	@if($categories->count()==0)
              		<div class="alert alert-danger">
              			<h3 style="" class="text-uppercase font-weight-bold">No record found !</h3>
              		</div>
              	@else
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <td width="80">Action</td>
                          <td width="300">Title</td>
                          <td>Post Count</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $catagory)
                        <tr>
                          <td>
                            {!!Form::model($catagory, [
                              'method'=>'DELETE',
                              'route' =>['catagories.destroy',$catagory->id],
                              
                            ])!!}
                            @if($catagory->id==9)
                            <a href="{{route('catagories.edit',$catagory->id)}}" class="btn btn-xs btn-default disabled"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-xs btn-danger disabled" onclick="return false;"><i class="fa fa-times"></i></button>
                            {!!Form::close()!!}
                            </td>
                            <td>{{$catagory->title}}</td>
                            <td>{{$catagory->posts->count()}}</td>
                            @else
                            <a href="{{route('catagories.edit',$catagory->id)}}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-xs btn-danger " onclick="return confirm('Do you really want to delete the catagory!Are you sure?')"><i class="fa fa-times"></i></button>
                            {!!Form::close()!!}
                            </td>
                            <td>{{$catagory->title}}</td>
                            <td>{{$catagory->posts->count()}}</td>
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
	              		{{$categories->appends(Request::query())->render()}}
	              	</ul>
              	</div>
              	<div class="pull-right">{{$categoryCount}}{{str_plural(' Item',$categoryCount)}}</div>
              </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
@endsection