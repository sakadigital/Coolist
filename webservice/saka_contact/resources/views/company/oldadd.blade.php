@if (isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post">
	{{ csrf_field() }}
	<table>
		<tr>
			<td>Id</td>
			<td>:</td>
			<td><input name="id" value="{{old('id')}}"></td>
		</tr>
		<tr>
			<td>Name</td>
			<td>:</td>
			<td><input name="name" value="{{old('name')}}"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td>:</td>
			<td><textarea name="address">{{old('address')}}</textarea></td>
		</tr>
		<tr>
			<td>Token</td>
			<td>:</td>
			<td><input name="token" value="{{old('token')}}"></td>
		</tr>
	</table>
	<input type="submit" name="Submit">
	<input type="reset" name="Reset">
</form>