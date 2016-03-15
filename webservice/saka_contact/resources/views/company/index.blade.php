<a href="{{URL::to('companies/add')}}">Add New</a>
<table border='1'>
	<tr>
		<th>Id.</th>
		<th>Name</th>
		<th>Address</th>
		<th>Token</th>
		<th>Action</th>
	</tr>
	@foreach($data as $company)
	<tr>
		<th>{{$company->id}}</th>
		<th>{{$company->name}}</th>
		<th>{{$company->address}}</th>
		<th>{{$company->token}}</th>
		<th>
		<a href="{{URL::to('company/update/'.$company->id)}}">Update</a>
		<a href="{{URL::to('company/delete/'.$company->id)}}">Delete</a>
		</th>
	</tr>	
	@endforeach
</table>