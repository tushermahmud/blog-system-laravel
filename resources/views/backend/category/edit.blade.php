@extends('layouts.backend.main')
@section('title','MyBlog | All Posts')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Edit Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('blog.index')}}">Category</a></li>
        <li class="active">Edit Category</li>
      </ol>
	</section>
	<section class="content">
        <div class="row">
          <div class="col-xs-8">
            <div class="box">
            	
              <!-- /.box-header -->
              <div class="box-body ">
              	{!!Form::model($catagory, [
              		'method'=>'PUT',
              		'route' =>['catagories.update',$catagory->id],
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
              <div class="text-center">
                {!!Form::submit('Update',["class"=>"btn btn-lg btn-info",'name' => 'submitbutton']);!!}
              </div>
            </div>
          </div>
        </div>
 

      <!-- ./row -->
    </section>
@endsection