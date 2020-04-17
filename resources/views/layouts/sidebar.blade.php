<div class="col-md-4">
                <aside class="right-sidebar">
                    <div class="search-widget">
                        <div class="input-group">
                          <input type="text" class="form-control input-lg" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-lg btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                          </span>
                        </div><!-- /input-group -->
                    </div>

                    <div class="widget">
                        <div class="widget-heading">
                            <h4>Categories</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="categories">

                                @foreach($catagories as $catagory)
                                <li>
                                    <a href="{{route('category',$catagory->slug)}}"><i class="fa fa-angle-right"></i> {{$catagory->title}}</a>
                                    <span class="badge pull-right">{{$catagory->posts->count()}}</span>
                                </li>
                                @endforeach
                               <!--  <li>
                                    <a href="#"><i class="fa fa-angle-right"></i> Web Design</a>
                                    <span class="badge pull-right">10</span>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-angle-right"></i> General</a>
                                    <span class="badge pull-right">10</span>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-angle-right"></i> DIY</a>
                                    <span class="badge pull-right">10</span>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-angle-right"></i> Facebook Development</a>
                                    <span class="badge pull-right">10</span>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                    <div class="widget">
                        <div class="widget-heading">
                            <h4>Popular Posts</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="popular-posts">
                                @foreach($popularPosts as $popularPost)
                                <li>
                                    <div class="post-image">
                                        <a href="{{route('blog.single.posts',$popularPost->slug)}}">
                                            <img src="/img/{{$popularPost->image}}" />
                                        </a>
                                    </div>
                                    <div class="post-body">
                                        <h6><a href="{{route('blog.single.posts',$popularPost->slug)}}">{{substr($popularPost->title, 0, 20)}}{{"..."}}</a></h6>
                                        <div class="post-meta">
                                            <span>{{$popularPost->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                <!-- <li>
                                    <div class="post-image">
                                        <a href="#">
                                            <img src="/img/Post_Image_4_thumb.jpg" />
                                        </a>
                                    </div>
                                    <div class="post-body">
                                        <h6><a href="#">Blog Post #4</a></h6>
                                        <div class="post-meta">
                                            <span>36 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-image">
                                        <a href="#">
                                            <img src="/img/Post_Image_3_thumb.jpg" />
                                        </a>
                                    </div>
                                    <div class="post-body">
                                        <h6><a href="#">Blog Post #3</a></h6>
                                        <div class="post-meta">
                                            <span>36 minutes ago</span>
                                        </div>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                    <div class="widget">
                        <div class="widget-heading">
                            <h4>Tags</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="tags">
                                <li><a href="#">PHP</a></li>
                                <li><a href="#">Codeigniter</a></li>
                                <li><a href="#">Yii</a></li>
                                <li><a href="#">Laravel</a></li>
                                <li><a href="#">Ruby on Rails</a></li>
                                <li><a href="#">jQuery</a></li>
                                <li><a href="#">Vue Js</a></li>
                                <li><a href="#">React Js</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
