<table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<td width="80">Action</td>
                    			<td width="300">Title</td>
                    			<td>Author</td>
                    			<td>Catagory</td>
                    			<td>Date </td>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($posts as $post)
                    		<tr>
                    			<td>
                            {!!Form::model($post, [
                              'method'=>'DELETE',
                              'route' =>['blog.destroy',$post->id],
                              
                            ])!!}
                    				<a href="{{route('blog.edit',$post->id)}}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i></a>
                    				<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>
                            {!!Form::close()!!}
                    			</td>
                    			<td>{{$post->title}}</td>
                    			<td>{{$post->author->name}}</td>
                    			<td>{{$post->catagory->title}}</td>
                    			<td>{{$post->created_at}}</td>
                    			@if($post->published_at==0)
                    			<td><span class="label label-warning">Draft</span></td>
                    			@endif
                    			@if($post->published_at==1)
                    			<td><span class="label label-success">Published</span></td>
                    			@endif
                    		</tr>
                    		@endforeach
                    	</tbody>
                    </table>