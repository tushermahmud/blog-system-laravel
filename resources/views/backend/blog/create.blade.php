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
        <li class="active">Create New Blog</li>
      </ol>
	</section>
	<section class="content">
        <div class="row">
          <div class="col-xs-8">
            <div class="box">
            	
              <!-- /.box-header -->
              <div class="box-body ">
              	{!!Form::model($post, [
              		'method'=>'POST',
              		'route' =>'blog.store',
                  'files' =>true
              	])!!}
              	<div class="form-group {{$errors->has('title')?'has-error':''}}">
              	{!!Form::label('Title');!!}
              	{!!Form::text('title',null,['class'=>"form-control","placeholder"=>"Title"]);!!}
              	@if($errors->has('title'))
              		<span class="help-block">{{$errors->first('title')}}</span>
              	@endif
              	</div>
              	<!-- <div class="form-group {{$errors->has('slug')?'has-error':''}}">
              	{!!Form::label('Slug');!!}
              	{!!Form::text('slug',null,['class'=>"form-control","placeholder"=>"Slug"]);!!}
              	@if($errors->has('slug'))
              		<span class="help-block">{{$errors->first('slug')}}</span>
              	@endif
              	</div> -->
              	<div class="form-group {{$errors->has('excerpt')?'has-error':''}}">
              	{!!Form::label('Excerpt');!!}
              	{!!Form::textarea('excerpt',null,['class'=>"form-control","placeholder"=>"Excrept"]);!!}
              	
              	@if($errors->has('excerpt'))
              		<span class="help-block">{{$errors->first('excerpt')}}</span>
              	@endif
              	</div>
              	<div class="form-group {{$errors->has('body')?'has-error':''}}">
              	{!!Form::label('Body');!!}
              	{!!Form::textarea('body',null,['class'=>"form-control","placeholder"=>"Body"]);!!}
              	@if($errors->has('body'))
              		<span class="help-block">{{$errors->first('body')}}</span>
              	@endif
              	</div>
              	
              	
                
              <!-- /.box-body -->
              
            </div>
            <!-- /.box -->
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Publish</h3>
            </div>
            <div class="box-body">
              <div class="form-group
                   {{$errors->has('created_at')?'has-error':''}}" id="created_at">
                   {!!Form::label('Created Date');!!}
                   <div class='input-group date' id='datetimepicker1'>
                        {!!Form::text('created_at',null,['class'=>"form-control","id"=>"created_at"]);!!}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </span>
                    </div>
                @if($errors->has('created_at'))
                  <span class="help-block">{{$errors->first('created_at')}}</span>
                @endif
                </div>
            </div>
            <div class="box-footer clearfix">
              <div class="pull-left">
                {!!Form::submit('In Draft!',["class"=>"btn btn-lg btn-warning",'name' => 'submitdraftbutton']);!!}
              </div>
              <div class="pull-right">
                {!!Form::submit('Publish',["class"=>"btn btn-lg btn-primary",'name' => 'submitbutton']);!!}
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                {!!Form::label('Category');!!}
                {!!Form::select('catagory_id',App\catagory::pluck('title','id'),null,['class'=>"form-control","placeholder"=>"Choose Catagory"]);!!}
                </div>
            </div>
            <div class="box-footer">
              
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Featured Image</h3>
            </div>
            <div class="box-body text-cnter">
              <div class=" form-group {{$errors->has('image')?'has-error':''}}">
                {!!Form::label('Choose your image');!!}
                <br>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                      <img src="http://gallery.smartadserver.com/demo_web/image/image_placeholder.png" alt="">
                    </div>
                  <div>
                      <span class="btn btn-default btn-file"><span class="fileinput-new btn btn-primary">Select image</span>
                      <span class="fileinput-exists">Change</span>{!!Form::file('image',null,['class'=>"form-control-file"]);!!}
                      </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>

                
                @if($errors->has('image'))
                  <span class="help-block">{{$errors->first('image')}}</span>
                @endif
                </div>
                <hr>
                {!!Form::close()!!}
              </div>
            </div>
            <div class="box-footer clearfix">
              
            </div>
          </div>
        </div>
      <!-- ./row -->
    </section>
@endsection