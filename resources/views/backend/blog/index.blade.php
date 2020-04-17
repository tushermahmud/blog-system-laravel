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
        <li><a href="{{route('blog.index')}}">Blog</a></li>
        <li class="active">Display all blogs</li>
      </ol>
	</section>
	<section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            	<div class="box-header clearfix">
               <div style="margin-bottom:20px ;display:block"class="pull-left">
                  <a class="btn btn-success" href="{{route('blog.create')}}">Add New</a>
                </div> 
                <div class="pull-right">
                  <a href="?status=all">All ({{$counts['all']}})</a>|
                  <a href="?status=own"> Own ({{$counts['own']}})</a> |
                  <a href="?status=trash"> Trash ({{$counts['trashed']}})</a> |
                  <a href="?status=published"> Published ({{$counts['published']}})</a> |
                  <a href="?status=draft"> Draft ({{$counts['draft']}})</a> 
                  
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body ">
              	
              	@if(session('status'))
              	<div class="alert alert-success d-block">
              		<h3 style="" class="text-uppercase font-weight-bold text-center">{{session('status')}}</h3>
              	</div>
                @elseif(session('trash'))
                <div class="alert alert-success d-block">
                  
                  <?php list($message,$id) = session('trash');?>
                  {!!Form::open(['method'=>'PUT',
                    'route' =>['blog.restore',$id],
                  ])!!}
                  <h3 style="" class="text-uppercase font-weight-bold text-center">{{$message}}
                  
                  <button type="submit" class="btn btn-lg btn-warning">Undo</button>
                  {!!Form::close()!!}
      
                  
                </div>
              	@endif
              	@if($posts->count()==0)
              		<div class="alert alert-danger">
              			<h3 style="" class="text-uppercase font-weight-bold">No record found !</h3>
              		</div>
              	@else
                    @if($onlyTrashed==true)
                      @include('backend.blog.trashed-table')
                    @else
                      @include('backend.blog.nottrashed-table')
                    @endif
                @endif
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
              	<div class="pull-left">
	              	<ul class="pagination no-margin">
	              		{{$posts->appends(Request::query())->render()}}
	              	</ul>
              	</div>
              	<div class="pull-right">{{$postCount}}{{str_plural(' Item',$postCount)}}</div>
              </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
@endsection