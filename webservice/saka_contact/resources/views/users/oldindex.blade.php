<a href="{{URL::to('users/add')}}">Add New</a>
<table border='1'>
	<tr>
		<th>Id.</th>
		<th>email</th>
		<th>First Name.</th>
		<th>Last Name</th>
		<th>Profile Picture.</th>
		<th>Password</th>
		<th>Phone.</th>
		<th>Twitter</th>
		<th>Facebook.</th>
		<th>Linkedin</th>
		<th>Registered.</th>
		<th>Roles</th>
		<th>Companies</th>
		<th>Status Types</th>
		<th>status Description</th>
		<th>Action</th>
	</tr>
	@foreach($data as $users)
	<tr>
		<th>{{$users->id}}</th>
		<th>{{$users->email}}</th>
		<th>{{$users->first_name}}</th>
		<th>{{$users->last_name}}</th>
		<th><img src="{{$users->profile_picture}}" width="50" height="50"/></th>
		<th>{{$users->password}}</th>
		<th>{{$users->phone}}</th>
		<th>{{$users->twitter}}</th>
		<th>{{$users->facebook}}</th>
		<th>{{$users->linkedin}}</th>
		<th>{{$users->registered}}</th>
		<th>{{$users->Roles->name}}</th>
		<th>{{$users->Companies->name}}</th>
		<th>{{$users->StatusTypes->name}}</th>
		<th>{{$users->status_description}}</th>
		<th>
		<a href="{{URL::to('users/update/'.$users->id)}}">Update</a>
		<a href="#" class="delete" id="{{$users->id}}">Delete</a>
		</th>
	</tr>	
	@endforeach
</table>

<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<script type="text/javascript">
	$('.delete').click(function(e){
		e.preventDefault();

		var id = $(this).attr('id');
		var ask = confirm("Anda yakin?");
		if (ask)
		{
			$.ajax({
				url : "{{URL::to('users/delete')}}/"+id,
				type : "DELETE",
				data: {"_token":"{{csrf_token()}}"},
				success:function(){
					alert('Data barhasi di hapus');
					window.location.reload();
				}
			})
		}
	})
</script>