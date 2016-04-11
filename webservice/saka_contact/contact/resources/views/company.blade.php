<a href="/add">Add New</a>
<table border='1'>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Token</th>
	</tr>
	@foreach($companies as $company)
		<tr>
			<td>{{$company->id}}</td>
			<td>{{$company->name}}</td>
			<td>{{$company->address}}</td>
			<td>{{$company->token}}</td>
		</tr>
	@endforeach
</table>