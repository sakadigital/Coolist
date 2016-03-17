<a href="{{URL::to('company_domains/add')}}">Add New</a>
<table border='1'>
	<tr>
		<th>Id.</th>
		<th>Companies</th>
		<th>Domain</th>
		<th>Action</th>
	</tr>
	@foreach($data as $company_domains)
	<tr>
		<th>{{$company_domains->id}}</th>
		<th>{{$company_domains->Companies->name}}</th>
		<th>{{$company_domains->domain}}</th>
		<th>
		<a href="{{URL::to('company_domains/update/'.$company_domains->id)}}">Update</a>
		<a href="#" class="delete" id="{{$company_domains->id}}">Delete</a>
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
				url : "{{URL::to('company_domains/delete')}}/"+id,
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