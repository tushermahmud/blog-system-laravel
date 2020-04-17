@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">

               @if (isset($categoryName))
               <div class="alert alert-info">
                   <h3>Category: <strong>{{$categoryName}}</strong></h3>
               </div>
               @endif
               @if (isset($authorName))
               <div class="alert alert-info">
                   <h3>Author: <strong class="text-capitalize">{{$authorName}}</strong></h3>
               </div>
               @endif
                @if($posts->count()==null)
               <div class="alert alert-warning">
                   <h3>Nothing to show!</h3>
               </div>
               @endif
                
                @foreach($posts as $post)

                <article class="post-item">
                    <div class="post-item-image">
                        <a href="{{route('blog.single.posts',$post->slug)}}">
                            <img src="img/{{$post->image}}" alt="">
                        </a>
                    </div>
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2><a href="{{route('blog.single.posts',$post->slug)}}">{{$post->title}}</a></h2>
                            <p>{!!$post->excerpt!!}</p>
                        </div>
                            
                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="{{route('author',$post->author->slug)}}">{{$post->author->name}} </a></li>
                                    <li><i class="fa fa-clock-o"></i><time>{{$post->created_at->diffForHumans()}}</time></li>
                                    <li><i class="fa fa-folder"></i><a href="{{route('category',$post->catagory->slug)}}">{{$post->catagory->title}}</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('blog.single.posts',$post->slug)}}">Continue Reading &raquo;</a>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
                <nav>
                  {{$posts->links()}}
                </nav>
            </div>
            @include('layouts.sidebar')
        </div>
    </div>

@endsection

    
