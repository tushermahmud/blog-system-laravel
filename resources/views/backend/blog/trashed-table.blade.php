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
                            @if(Auth::user()->hasRole('editor')||Auth::user()->hasRole('admin'))
                    		{!!Form::model($post, [
                    		'style'=>'display:inline-block',
                            'method'=>'PUT',
                            'route' =>['blog.restore',$post->id],
                              
                            ])!!}

                            <button title="Restore" type="submit" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></button>
                            {!!Form::close()!!}
                            {!!Form::model($post, [
                            'style'=>'display:inline-block',
                              'method'=>'DELETE',
                              'route' =>['blog.force-destroy',$post->id],
                              
                            ])!!}
                    		<button title="Destroy Permanantly" class="btn btn-xs btn-danger" onclick="return confirm('you are about to delete the post premanantly. Are you sure?')"><i class="fa fa-trash"></i></button>
                    				
                            {!!Form::close()!!}
                            @elseif(Auth::user()->hasRole('author'))
                                   @if($post->author_id==Auth::user()->id)
                                   {!!Form::model($post, [
                            'style'=>'display:inline-block',
                            'method'=>'PUT',
                            'route' =>['blog.restore',$post->id],
                              
                            ])!!}

                            <button title="Restore" type="submit" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></button>
                            {!!Form::close()!!}
                            {!!Form::model($post, [
                            'style'=>'display:inline-block',
                              'method'=>'DELETE',
                              'route' =>['blog.force-destroy',$post->id],
                              
                            ])!!}
                            <button title="Destroy Permanantly" class="btn btn-xs btn-danger" onclick="return confirm('you are about to delete the post premanantly. Are you sure?')"><i class="fa fa-trash"></i></button>
                                    
                            {!!Form::close()!!}
                            @else
                            {!!Form::model($post, [
                            'style'=>'display:inline-block',
                            'method'=>'PUT',
                            'route' =>['blog.restore',$post->id],
                              
                            ])!!}

                            <button title="Restore" type="submit" class="disabled btn btn-xs btn-default"><i class="fa fa-refresh"></i></button>
                            {!!Form::close()!!}
                            {!!Form::model($post, [
                            'style'=>'display:inline-block',
                              'method'=>'DELETE',
                              'route' =>['blog.force-destroy',$post->id],
                              
                            ])!!}
                            <button title="Destroy Permanantly" class="disabled btn btn-xs btn-danger" onclick="return confirm('you are about to delete the post premanantly. Are you sure?')"><i class="fa fa-trash"></i></button>
                                    
                            {!!Form::close()!!}
                            @endif
                        @endif
                    			</td>
                    			<td>{{$post->title}}</td>
                    			<td>{{$post->author->name}}</td>
                    			<td>{{$post->catagory->title}}</td>
                    			<td>{{$post->created_at}}</td>
                    			
                    		</tr>
                    		@endforeach
                    	</tbody>
                    </table>