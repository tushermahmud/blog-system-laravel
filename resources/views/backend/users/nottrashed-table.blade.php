                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<td width="80">Action</td>
                    			<td width="300">Name</td>
                    			<td>Bio</td>
                    			<td>Email</td>
                    			<td>Role </td>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($users as $user)
                    		<tr>
                    			<td>
                    			     <a href="{{route('users.edit',$user->id)}}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-xs btn-danger" href="{{route('user.confirm',$user->id)}}"></a>
                    			</td>
                    			
                    			<td>{{$user->name}}</td>
                    			<td>{{$user->bio}}</td>
                    			<td>{{$user->email}}</td>
                                   <td>{{$user->email}}</td>
                    			
                    		</tr>
                    		@endforeach
                    	</tbody>
                    </table>