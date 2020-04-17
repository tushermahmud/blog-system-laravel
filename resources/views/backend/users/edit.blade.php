@extends('layouts.backend.main')
@section('title','MyBlog | All Posts')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Edit User
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('blog.index')}}">User</a></li>
        <li class="active">Edit User</li>
      </ol>
	</section>
	<section class="content">
        <div class="row">
          <div class="col-xs-8">
            <div class="box">
            	
              <!-- /.box-header -->
              <div class="box-body ">
              	{!!Form::model($user, [
              		'method'=>'PUT',
              		'route' =>['users.update',$user->id],
              	])!!}
              	<div class="form-group {{$errors->has('name')?'has-error':''}}">
                {!!Form::label('Your Name');!!}
                {!!Form::text('name',null,['class'=>"form-control","placeholder"=>"Your name"]);!!}
                @if($errors->has('name'))
                  <span class="help-block">{{$errors->first('name')}}</span>
                @endif
                </div>
                <div class="form-group {{$errors->has('email')?'has-error':''}}">
                {!!Form::label('Email-address');!!}
                {!!Form::email('email',null,['class'=>"form-control","placeholder"=>"Email-address"]);!!}
                @if($errors->has('email'))
                  <span class="help-block">{{$errors->first('email')}}</span>
                @endif
                </div>
                <div class="form-group {{$errors->has('bio')?'has-error':''}}">
                {!!Form::label('Bio');!!}
                {!!Form::textarea('bio',null,['class'=>"form-control","placeholder"=>"Bio"]);!!}
                @if($errors->has('bio'))
                  <span class="help-block">{{$errors->first('bio')}}</span>
                @endif
                </div>
              	<div class="form-group {{$errors->has('password')?'has-error':''}}">
                {!!Form::label('Password');!!}
                {!!Form::password('password',['class'=>"form-control","placeholder"=>"Password"]);!!}
                @if($errors->has('password'))
                  <span class="help-block">{{$errors->first('password')}}</span>
                @endif
                </div>
                <div class="form-group {{$errors->has('password_confirmation')?'has-error':''}}">
                {!!Form::label('Password Confirmation');!!}
                {!!Form::password('password_confirmation',['class'=>"form-control","placeholder"=>"Password Confirmation"]);!!}
                @if($errors->has('password'))
                  <span class="help-block">{{$errors->first('password')}}</span>
                @endif
                </div>
                <div class="form-group {{$errors->has('role')?'has-error':''}}">
                {!!Form::label('Roles');!!}<br>
                {!!Form::select('role',App\Role::pluck('display_name','id'),null,['class'=>"form-control","placeholder"=>"Select Role"]);!!}
                @if($errors->has('role'))
                  <span class="help-block">{{$errors->first('role')}}</span>
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
                   {!!Form::label('Update Date');!!}
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
              {!!Form::close()!!}
            </div>
          </div>
        </div>
 

      <!-- ./row -->
    </section>
@endsection