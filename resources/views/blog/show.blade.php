@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-item post-detail">
                    <div class="post-item-image">
                        <a href="#">
                            <img src="/img/{{$posts->image}}" alt="">
                        </a>
                    </div>

                    <div class="post-item-body">
                        <div class="padding-10">
                            <h1>{{$posts->title}}</h1>

                            <div class="post-meta no-border">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="{{route('author',$posts->author->slug)}}">{{$posts->author->name}}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time>{{$posts->created_at->diffForHumans()}}</time></li>
                                    <li><i class="fa fa-folder"></i><a href="{{route('category',$posts->catagory->slug)}}">{{$posts->catagory->title}}</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>

                            {!!$posts->body!!}
                        </div>
                    </div>
                </article>

                <article class="post-author padding-10">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img alt="Author" src="{{ $posts->author->gravater() }}" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading text-capitalize"><a href="{{route('author',$posts->author->slug)}}">{{$posts->author->name}}</a></h4>
                        <div class="post-author-count">
                          <a href="{{route('author',$posts->author->slug)}}">
                              <i class="fa fa-clone"></i>
                              <?php $post_count=$posts->author->posts->count();?>
                            {{$post_count}}{{' '}}{{str_plural('post',$post_count)}}
                          </a>
                        </div>
                        <p>{{$posts->author->bio}}</p>
                      </div>
                    </div>
                </article>
            @include('layouts.comments')
            </div>
            @include('layouts.sidebar')
        </div>
    </div>
@endsection

 