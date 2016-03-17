<a href="{{URL::to('roles/add')}}">Add New</a>
<table border='1'>
	<tr>
		<th>Id.</th>
		<th>Nama</th>
		<th>Action</th>
	</tr>
	@foreach($data as $roles)
	<tr>
		<th>{{$roles->id}}</th>
		<th>{{$roles->name}}</th>
		<th>
		<a href="{{URL::to('roles/update/'.$roles->id)}}">Update</a>
		<a href="#" class="delete" id="{{$roles->id}}">Delete</a>
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
				url : "{{URL::to('roles/delete')}}/"+id,
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